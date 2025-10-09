-- Author: Ignatius Warren Benjamin Javelona

--DATABASE: nixar_autoglass_db
    -- TABLE: users
    INSERT INTO 
        users (user_id, role, name, password_hashed)
    VALUES
        (1, 'admin', 'Administrator 1', '$2y$10$pAf3CK.k5mvP0Ii2fzz4K.eQbH/iQskBlmv2XtN0mvmsgoTqRdxC2'),
        (2, 'admin', 'Administrator 2', '$2y$10$MJuNvpt3hPxl9cBtBZ6qleC1GVJeuDBWwgqvmkNEt6KdkhMWFLHQ2'),
        (3, 'admin', 'Administrator 3', '$2y$10$J78Kndy7Ol3Hw9wm7GmRculM4sxeBNBFLGQQ1KGSPyalUQOF56VIq'),
        (4, 'cashier', 'Cashier 1', '$2y$10$WYefz0uFxo2f2OtLir7HY.9r5ku83giUa0UQ9O2Lw/I/GXhafYM4K'),
        (5, 'cashier', 'Cashier 2', '$2y$10$wBeYa5dgX/X0jifqaiSduOS3gsWOK9L2f1fwg7.NTHtNGVdLWozCC'),
        (6, 'cashier', 'Cashier 3', '$2y$10$PfcaUfteVZS1jkgB0AP06eH39KhPXYo8KG2XqRqKEFsO2Jv29TYgi'),
        (7, 'cashier', 'Cashier 4', '$2y$10$QKcZHEcAmok4yfLj85YE8eknjHmmhW4dmw5dWgwBgidn7r8LG//X.'),
        (8, 'cashier', 'Cashier 5', '$2y$10$02S213CyHGwveYZ3lPEeBuD3WuGKwaUJv.cnuh5PBq5lYAEe.tIPa');

    -- TABLE: transactions
    INSERT INTO
        transactions (issuer_id, receipt_id, customer_id, payment_method)
    VALUES
        (1, 1001, 501, 'Cash on Hand'),
        (2, 1002, 502, 'GCash'),
        (3, 1003, 503, 'Cash on Hand'),
        (4, 1004, 504, 'GCash'),
        (5, 1005, 505, 'Cash on Hand'),
        (6, 1006, 506, 'GCash'),
        (7, 1007, 507, 'Cash on Hand'),
        (8, 1008, 508, 'GCash'),
        (4, 1009, 509, 'Cash on Hand'),
        (5, 1010, 510, 'GCash'),
        (6, 1011, 511, 'Cash on Hand'),
        (7, 1012, 512, 'GCash'),
        (8, 1013, 513, 'Cash on Hand'),
        (1, 1014, 514, 'GCash'),
        (2, 1015, 515, 'Cash on Hand');
        
    -- TABLE: customers
    INSERT INTO 
        customers (customer_id, name, email, address, phone_no)
    VALUES
        (501, 'Juan Dela Cruz', 'juan.delacruz@example.com', '123 Mabini St., Manila', '09171234567'),
        (502, 'Maria Santos', 'maria.santos@example.com', '45 Rizal Ave., Quezon City', '09182345678'),
        (503, 'Jose Ramirez', 'jose.ramirez@example.com', '78 Bonifacio St., Pasig', '09193456789'),
        (504, 'Ana Lopez', 'ana.lopez@example.com', '12 P. Burgos St., Makati', '09204567891'),
        (505, 'Carlo Mendoza', 'carlo.mendoza@example.com', '56 Katipunan Ave., QC', '09215678912'),
        (506, 'Liza Gonzales', 'liza.gonzales@example.com', '89 Taft Ave., Manila', '09226789123'),
        (507, 'Patrick Reyes', 'patrick.reyes@example.com', '34 EDSA, Mandaluyong', '09237891234'),
        (508, 'Ella Cruz', 'ella.cruz@example.com', '90 Ortigas Ave., Pasig', '09248912345'),
        (509, 'Nico Garcia', 'nico.garcia@example.com', '77 Aurora Blvd., San Juan', '09259023456'),
        (510, 'Sofia Lim', 'sofia.lim@example.com', '25 Shaw Blvd., Mandaluyong', '09260134567'),
        (511, 'Ryan Torres', 'ryan.torres@example.com', '18 Buendia Ave., Makati', '09271235678'),
        (512, 'Clarisse Tan', 'clarisse.tan@example.com', '60 Marcos Hwy., Antipolo', '09282346789'),
        (513, 'David Cruz', 'david.cruz@example.com', '11 Magsaysay Blvd., Manila', '09293457890'),
        (514, 'Bea Navarro', 'bea.navarro@example.com', '99 Pioneer St., Mandaluyong', '09304568901'),
        (515, 'Miguel Ramos', 'miguel.ramos@example.com', '150 Katipunan Ext., QC', '09315679012');

    -- TABLE: receipts
    INSERT INTO 
        receipts (receipt_id, sale_date, total_amount, created_at)
    VALUES
        (1001, '2025-10-01',  250.75, '2025-10-01 09:15:23'),
        (1002, '2025-10-01',  480.00, '2025-10-01 10:42:56'),
        (1003, '2025-10-02',  315.50, '2025-10-02 11:08:19'),
        (1004, '2025-10-02',  910.20, '2025-10-02 13:34:47'),
        (1005, '2025-10-03',  150.00, '2025-10-03 09:25:10'),
        (1006, '2025-10-03',  720.60, '2025-10-03 15:45:31'),
        (1007, '2025-10-04',  420.90, '2025-10-04 10:13:44'),
        (1008, '2025-10-04',  305.20, '2025-10-04 12:01:22'),
        (1009, '2025-10-05',  875.00, '2025-10-05 14:50:55'),
        (1010, '2025-10-05',  199.99, '2025-10-05 16:40:18'),
        (1011, '2025-10-06',  665.30, '2025-10-06 09:33:11'),
        (1012, '2025-10-06',  540.00, '2025-10-06 11:15:03'),
        (1013, '2025-10-07',  380.75, '2025-10-07 13:20:17'),
        (1014, '2025-10-07',  999.50, '2025-10-07 15:40:09'),
        (1015, '2025-10-08',  250.00, '2025-10-08 10:58:34');

    -- TABLE: receipt_details
    INSERT INTO 
        receipt_details (receipt_details_id, receipt_id, nixar_product_sku, quantity)
    VALUES
        (1, 1001, 'NX-100-A', 2),
        (2, 1002, 'NX-200-B', 1),
        (3, 1003, 'NX-150-C', 3),
        (4, 1004, 'NX-250-D', 1),
        (5, 1005, 'NX-300-A', 4),
        (6, 1006, 'NX-400-B', 2),
        (7, 1007, 'NX-100-A', 1),
        (8, 1008, 'NX-450-C', 2),
        (9, 1009, 'NX-500-D', 3),
        (10, 1010, 'NX-550-A', 2),
        (11, 1011, 'NX-600-B', 1),
        (12, 1012, 'NX-650-C', 2),
        (13, 1013, 'NX-700-D', 1),
        (14, 1014, 'NX-800-A', 3),
        (15, 1015, 'NX-850-B', 2),
        (16, 1002, 'NX-100-A', 2),
        (17, 1004, 'NX-300-B', 1),
        (18, 1007, 'NX-250-C', 1),
        (19, 1010, 'NX-500-A', 1),
        (20, 1013, 'NX-650-D', 2);
    -- TABLE: car_details
    INSERT INTO 
        car_details (car_detail_id, customer_id, car_model_id, plate_no)
    VALUES
        (1, 501, 1, 'ABC-1234'),
        (2, 502, 2, 'DEF-5678'),
        (3, 503, 3, 'GHI-9012'),
        (4, 504, 1, 'JKL-3456'),
        (5, 505, 4, 'MNO-7890'),
        (6, 506, 2, 'PQR-2345'),
        (7, 507, 5, 'STU-6789'),
        (8, 508, 3, 'VWX-0123'),
        (9, 509, 4, 'YZA-4567'),
        (10, 510, 5, 'BCD-8901');

    -- TABLE: car_models
    INSERT INTO 
        car_models (car_model_id, make, model, year, type)
    VALUES
        (1, 'Toyota', 'Vios', 2022, 'Sedan'),
        (2, 'Honda', 'Civic', 2021, 'Sedan'),
        (3, 'Ford', 'Ranger', 2023, 'Pickup'),
        (4, 'Nissan', 'Navara', 2022, 'Pickup'),
        (5, 'Mitsubishi', 'Montero', 2023, 'SUV');

    -- TABLE: product_compatibility
    INSERT INTO 
        product_compatibility (product_compatibility_id, nixar_products_sku, car_model_id)
    VALUES
        (1, 'NX-100-A', 1),
        (2, 'NX-150-C', 2),
        (3, 'NX-200-B', 1),
        (4, 'NX-250-D', 3),
        (5, 'NX-300-A', 2),
        (6, 'NX-300-B', 4),
        (7, 'NX-400-B', 1),
        (8, 'NX-450-C', 3),
        (9, 'NX-500-D', 5),
        (10, 'NX-500-A', 2),
        (11, 'NX-550-A', 4),
        (12, 'NX-600-B', 5),
        (13, 'NX-650-C', 1),
        (14, 'NX-650-D', 3),
        (15, 'NX-700-D', 2),
        (16, 'NX-800-A', 5),
        (17, 'NX-850-B', 4);

    -- TABLE: nixar_products
    INSERT INTO 
        nixar_products (nixar_product_sku, product_material_id, product_variant_id, product_name, base_price, product_image_url)
    VALUES
        ('NX-100-A', 1, 1, 'Nixar Eco Bottle 500ml', 250.00, 'https://example.com/images/nx100a.jpg'),
        ('NX-150-C', 1, 2, 'Nixar Eco Bottle 1L', 320.00, 'https://example.com/images/nx150c.jpg'),
        ('NX-200-B', 2, 1, 'Nixar Tumbler 350ml', 280.00, 'https://example.com/images/nx200b.jpg'),
        ('NX-250-D', 2, 2, 'Nixar Tumbler 500ml', 340.00, 'https://example.com/images/nx250d.jpg'),
        ('NX-300-A', 3, 1, 'Nixar Stainless Straw Set', 150.00, 'https://example.com/images/nx300a.jpg'),
        ('NX-300-B', 3, 2, 'Nixar Bamboo Straw Set', 120.00, 'https://example.com/images/nx300b.jpg'),
        ('NX-400-B', 4, 1, 'Nixar Travel Mug', 390.00, 'https://example.com/images/nx400b.jpg'),
        ('NX-450-C', 4, 2, 'Nixar Thermo Mug', 420.00, 'https://example.com/images/nx450c.jpg'),
        ('NX-500-D', 5, 1, 'Nixar Coffee Cup 12oz', 250.00, 'https://example.com/images/nx500d.jpg'),
        ('NX-500-A', 5, 2, 'Nixar Coffee Cup 16oz', 280.00, 'https://example.com/images/nx500a.jpg'),
        ('NX-550-A', 6, 1, 'Nixar Glass Bottle', 310.00, 'https://example.com/images/nx550a.jpg'),
        ('NX-600-B', 6, 2, 'Nixar Mini Bottle 250ml', 200.00, 'https://example.com/images/nx600b.jpg'),
        ('NX-650-C', 7, 1, 'Nixar Smart Bottle', 750.00, 'https://example.com/images/nx650c.jpg'),
        ('NX-650-D', 7, 2, 'Nixar Smart Bottle Pro', 890.00, 'https://example.com/images/nx650d.jpg'),
        ('NX-700-D', 8, 1, 'Nixar Hydro Flask 750ml', 950.00, 'https://example.com/images/nx700d.jpg'),
        ('NX-800-A', 9, 1, 'Nixar Thermal Bottle XL', 1100.00, 'https://example.com/images/nx800a.jpg'),
        ('NX-850-B', 10, 1, 'Nixar Cup Set (4pcs)', 650.00, 'https://example.com/images/nx850b.jpg');

    -- TABLE: product_variants
    INSERT INTO product_variants 
        (product_variant_id, variant_name)
    VALUES
        (1, 'Small'),
        (2, 'Medium'),
        (3, 'Large'),
        (4, 'Extra Large'),
        (5, 'Family Pack');

    -- TABLE: product_materials
    INSERT INTO 
        product_materials (product_material_id, material)
    VALUES
        (1, 'Stainless Steel'),
        (2, 'Plastic'),
        (3, 'Bamboo'),
        (4, 'Ceramic'),
        (5, 'Glass'),
        (6, 'Aluminum'),
        (7, 'Smart Alloy'),
        (8, 'Titanium'),
        (9, 'Insulated Metal'),
        (10, 'Composite Blend');

    -- TABLE: inventory
    INSERT INTO 
        inventory (inventory_id, nixar_product_sku, current_stock, min_threshold, updated_at)
    VALUES
        (1, 'NX-100-A', 120, 20, '2025-10-08 09:15:00'),
        (2, 'NX-150-C', 85, 15, '2025-10-08 09:20:00'),
        (3, 'NX-200-B', 60, 10, '2025-10-08 09:25:00'),
        (4, 'NX-250-D', 45, 10, '2025-10-08 09:30:00'),
        (5, 'NX-300-A', 150, 25, '2025-10-08 09:35:00'),
        (6, 'NX-300-B', 110, 20, '2025-10-08 09:40:00'),
        (7, 'NX-400-B', 70, 15, '2025-10-08 09:45:00'),
        (8, 'NX-450-C', 50, 10, '2025-10-08 09:50:00'),
        (9, 'NX-500-D', 90, 20, '2025-10-08 09:55:00'),
        (10, 'NX-500-A', 75, 15, '2025-10-08 10:00:00'),
        (11, 'NX-550-A', 40, 10, '2025-10-08 10:05:00'),
        (12, 'NX-600-B', 200, 30, '2025-10-08 10:10:00'),
        (13, 'NX-650-C', 35, 8, '2025-10-08 10:15:00'),
        (14, 'NX-650-D', 20, 5, '2025-10-08 10:20:00'),
        (15, 'NX-700-D', 18, 5, '2025-10-08 10:25:00'),
        (16, 'NX-800-A', 12, 4, '2025-10-08 10:30:00'),
        (17, 'NX-850-B', 25, 6, '2025-10-08 10:35:00');

    -- TABLE: product_suppliers
    INSERT INTO 
        product_suppliers (product_supplier_id, nixar_product_sku, supplier_id, mark_up_price)
    VALUES
        (1, 'NX-100-A', 1, 275.00),
        (2, 'NX-150-C', 1, 345.00),
        (3, 'NX-200-B', 2, 310.00),
        (4, 'NX-250-D', 2, 365.00),
        (5, 'NX-300-A', 3, 165.00),
        (6, 'NX-300-B', 3, 140.00),
        (7, 'NX-400-B', 4, 420.00),
        (8, 'NX-450-C', 4, 450.00),
        (9, 'NX-500-D', 4, 275.00),
        (10, 'NX-500-A', 4, 295.00),
        (11, 'NX-550-A', 5, 340.00),
        (12, 'NX-600-B', 5, 225.00),
        (13, 'NX-650-C', 5, 820.00),
        (14, 'NX-650-D', 5, 950.00),
        (15, 'NX-700-D', 2, 1020.00),
        (16, 'NX-800-A', 2, 1180.00),
        (17, 'NX-850-B', 3, 690.00);

    -- TABLE: suppliers
    INSERT INTO 
        suppliers (supplier_id, name, contact_no) 
    VALUES
        (1, 'FreshMart Distributors', '09171234567'),
        (2, 'AgroPrime Supplies', '09283456789'),
        (3, 'EcoTrade Ventures', '09394561234'),
        (4, 'GlobalFarm Imports', '09505672345'),
        (5, 'PrimeSource Retail', '09616783456');
