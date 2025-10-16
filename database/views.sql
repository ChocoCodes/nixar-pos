/*
    Author: John Roland L. Octavio, Josh Dane M. Labistre, Ignatius Warren Benjamin D. Javelona

    `views.sql` is intended to simplify PHP queries by creating database VIEWS 
    that perform multiple table JOINs when retrieving data in different tables.
*/

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

CREATE OR REPLACE VIEW inventory_report AS
SELECT 
    SUM(current_stock) AS total_stock,
    SUM(CASE WHEN current_stock = 0 THEN 1 ELSE 0 END) AS out_of_stock,
    SUM(CASE WHEN current_stock < min_threshold THEN 1 ELSE 0 END) AS low_stock
FROM inventory;

CREATE OR REPLACE VIEW sales_report AS
SELECT
    ROUND(SUM(total_amount), 2)AS total_revenue,
    COUNT(receipt_id) AS total_transactions,
    ROUND(SUM(total_amount) / COUNT(receipt_id), 2) AS average_order_value
FROM receipts;

