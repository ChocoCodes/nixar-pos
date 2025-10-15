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
       i.stocks,
       ps.base_price + (ps.base_price * np.mark_up / 100) AS final_price
FROM nixar_products np
JOIN product_compatibility pc ON np.nixar_product_sku = pc.nixar_product_sku
JOIN car_models cm ON pc.car_model_id = cm.car_model_id
JOIN product_materials pm ON np.product_material_id = pm.product_material_id
JOIN inventory i ON np.nixar_product_sku = i.nixar_product_sku
JOIN product_suppliers ps ON np.nixar_product_sku = ps.nixar_product_sku
WHERE np.is_deleted = 0;
