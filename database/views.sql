/*
    Author: John Roland L. Octavio, Josh Dane M. Labistre, Ignatius Warren Benjamin D. Javelona

    `views.sql` is intended to simplify PHP queries by creating database VIEWS 
    that perform multiple table JOINs when retrieving data in different tables.
*/

USE nixar_autoglass_db;

-- ================================== INVENTORY ==================

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

-- ============== SALES REPORT METRICS ==================
CREATE OR REPLACE VIEW sales_report_metrics AS 
SELECT 
	SUM(total_amount) AS total_revenue, 
	COUNT(receipt_id) AS total_transactions,
	AVG(total_amount) AS avg_transaction_value,
    0 AS profit_performance
FROM receipts AS r;

-- ============== SALES REPORT LIST METRICS ==============

CREATE OR REPLACE VIEW category_performance_list_metrics AS 
SELECT category, COUNT(category) AS category_performance
FROM product_materials
GROUP BY category
ORDER BY category_performance DESC
LIMIT 5;

CREATE OR REPLACE VIEW sales_by_time_list_metrics AS 
SELECT
	DATE_FORMAT(created_at, '%l %p') AS hour_label,  
	COUNT(*) AS total_orders
FROM receipts
GROUP BY hour_label, HOUR(created_at)
ORDER BY HOUR(created_at)
LIMIT 5;