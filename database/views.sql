-- Author: John Roland L. Octavio, Toby Javelona, Josh Dane Labistre
-- `views.sql` is intended to simplify PHP queries by creating database VIEWS
-- that perform multiple table JOINs when retrieving data in different tables.

USE nixar_autoglass_db;

CREATE OR REPLACE VIEW product_inventory_view AS
SELECT np.product_name,
       cm.make,
       cm.model,
       cm.year,
       cm.type,
       pm.category,
       i.current_stock,
       ROUND(ps.base_price + (ps.base_price * (np.mark_up / 100)), 2) AS final_price
FROM nixar_products np
JOIN product_compatibility pc ON np.nixar_product_sku = pc.nixar_product_sku
JOIN car_models cm ON pc.car_model_id = cm.car_model_id
JOIN product_materials pm ON np.product_material_id = pm.product_material_id
JOIN inventory i ON np.nixar_product_sku = i.nixar_product_sku
JOIN product_suppliers ps ON np.nixar_product_sku = ps.nixar_product_sku
WHERE np.is_deleted = 0;

CREATE OR REPLACE VIEW most_sold_item_by_qty AS
SELECT 
    np.nixar_product_sku,
    np.product_name,
    pm.category,
    SUM(rd.quantity) AS total_quantity_sold
FROM receipt_details rd
JOIN nixar_products np ON rd.nixar_product_sku = np.nixar_product_sku
JOIN product_materials pm ON np.product_material_id = pm.product_material_id
GROUP BY np.nixar_product_sku, np.product_name, pm.category
ORDER BY total_quantity_sold DESC
LIMIT 5;

CREATE OR REPLACE VIEW best_selling_item_by_revenue AS
SELECT 
    np.nixar_product_sku, 
    np.product_name, pm.category, 
    SUM(rd.quantity) AS total_quantity_sold, 
    ROUND(SUM(rd.quantity * np.mark_up), 2) AS total_revenue 
FROM receipt_details rd 
JOIN nixar_products np ON rd.nixar_product_sku = np.nixar_product_sku 
JOIN product_materials pm ON np.product_material_id = pm.product_material_id 
GROUP BY np.nixar_product_sku, np.product_name, pm.category 
ORDER BY total_revenue DESC 
LIMIT 5;