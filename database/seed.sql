-- Author: Ignatius Warren Benjamin Javelona

--DATABASE: nixar_autoglass_db
    -- TABLE: users
    INSERT INTO 
        users (user_id, role, name, password_hashed)
    VALUES
        (1, 'admin', 'Administrator_1', '$2y$10$pAf3CK.k5mvP0Ii2fzz4K.eQbH/iQskBlmv2XtN0mvmsgoTqRdxC2'),
        (2, 'cashier', 'Cashier_1', '$2y$10$WYefz0uFxo2f2OtLir7HY.9r5ku83giUa0UQ9O2Lw/I/GXhafYM4K')

    -- TABLE: transactions
    INSERT INTO 
        transactions (issuer_id, receipt_id, customer_id, payment_method)
    VALUES
        (1, 1001, 501, 'Cash on Hand'),
        (2, 1002, 502, 'GCash'),
        (1, 1003, 503, 'Cash on Hand'),
        (2, 1004, 504, 'GCash'),
        (1, 1005, 505, 'Cash on Hand'),
        (2, 1006, 506, 'GCash'),
        (1, 1007, 507, 'Cash on Hand'),
        (2, 1008, 508, 'GCash');
        
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
        (1001, '2025-10-01', 8500.00, '2025-10-01 09:15:23'),
        (1002, '2025-10-01', 3400.00, '2025-10-01 10:42:56'),
        (1003, '2025-10-02', 2800.00, '2025-10-02 11:08:19'),
        (1004, '2025-10-03', 580.00, '2025-10-03 14:15:00'),
        (1005, '2025-10-03', 750.00, '2025-10-03 15:45:31'),
        (1006, '2025-10-04', 7800.00, '2025-10-04 09:33:11'),
        (1007, '2025-10-04', 3000.00, '2025-10-04 11:15:03'),
        (1008, '2025-10-05', 3200.00, '2025-10-05 16:40:18');

    -- TABLE: receipt_details
    INSERT INTO 
        receipt_details (receipt_details_id, receipt_id, nixar_product_sku, quantity)
    VALUES
        (1, 1001, 'NX-GLS-001', 1),
        (2, 1002, 'NX-MIR-003', 1),
        (3, 1003, 'NX-TNT-002', 1),
        (4, 1004, 'NX-ACC-002', 1),
        (5, 1005, 'NX-ACC-001', 1),
        (6, 1006, 'NX-GLS-002', 1),
        (7, 1007, 'NX-TNT-003', 1),
        (8, 1008, 'NX-MIR-001', 1);

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
        (1, 'NX-GLS-001', 1),
        (2, 'NX-MIR-001', 1),
        (3, 'NX-MIR-002', 1),
        (4, 'NX-GLS-002', 2),
        (5, 'NX-MIR-003', 2),
        (6, 'NX-MIR-004', 2),
        (7, 'NX-GLS-003', 3),
        (8, 'NX-GLS-004', 4),
        (9, 'NX-GLS-005', 4),
        (10, 'NX-GLS-006', 5),
        (11, 'NX-GLS-007', 5);

    -- TABLE: nixar_products
    INSERT INTO 
        nixar_products (nixar_product_sku, product_material_id, product_variant_id, product_name, base_price, product_image_url)
    VALUES
        -- Glass
        ('NX-GLS-001', 1, 1, 'Toyota Fortuner 2016 Windshield Glass', 8500.00, 'https://example.com/images/fortuner_windshield.jpg'),
        ('NX-GLS-002', 1, 1, 'Honda Civic 2018 Windshield Glass', 7800.00, 'https://example.com/images/civic_windshield.jpg'),
        ('NX-GLS-003', 1, 1, 'Mitsubishi Montero Sport 2020 Windshield Glass', 9200.00, 'https://example.com/images/montero_windshield.jpg'),
        ('NX-GLS-004', 2, 2, 'Nissan Navara 2022 Front Door Glass (LH)', 4300.00, 'https://example.com/images/navara_front_glass_lh.jpg'),
        ('NX-GLS-005', 2, 2, 'Nissan Navara 2022 Front Door Glass (RH)', 4300.00, 'https://example.com/images/navara_front_glass_rh.jpg'),
        ('NX-GLS-006', 2, 1, 'Ford Ranger 2023 Rear Door Glass (LH)', 4100.00, 'https://example.com/images/ranger_rear_glass_lh.jpg'),
        ('NX-GLS-007', 2, 1, 'Ford Ranger 2023 Rear Door Glass (RH)', 4100.00, 'https://example.com/images/ranger_rear_glass_rh.jpg'),

        -- Mirrors
        ('NX-MIR-001', 4, 1, 'Toyota Fortuner 2016 Side Mirror (LH)', 3200.00, 'https://example.com/images/fortuner_mirror_lh.jpg'),
        ('NX-MIR-002', 4, 1, 'Toyota Fortuner 2016 Side Mirror (RH)', 3200.00, 'https://example.com/images/fortuner_mirror_rh.jpg'),
        ('NX-MIR-003', 4, 2, 'Honda Civic 2018 Side Mirror with Signal (LH)', 3400.00, 'https://example.com/images/civic_mirror_lh.jpg'),
        ('NX-MIR-004', 4, 2, 'Honda Civic 2018 Side Mirror with Signal (RH)', 3400.00, 'https://example.com/images/civic_mirror_rh.jpg'),

        -- Universal Tints (no model dependency)
        ('NX-TNT-001', 3, 3, '3M Ceramic Tint Medium Shade', 2500.00, 'https://example.com/images/3m_tint_medium.jpg'),
        ('NX-TNT-002', 3, 3, '3M Ceramic Tint Dark Shade', 2800.00, 'https://example.com/images/3m_tint_dark.jpg'),
        ('NX-TNT-003', 3, 4, 'Llumar Platinum Tint 50%', 3000.00, 'https://example.com/images/llumar_tint_50.jpg'),
        ('NX-TNT-004', 3, 4, 'Llumar Platinum Tint 35%', 3100.00, 'https://example.com/images/llumar_tint_35.jpg'),

        -- Accessories
        ('NX-ACC-001', 5, 3, 'Universal Wiper Blade Set 22”', 750.00, 'https://example.com/images/wiper_set.jpg'),
        ('NX-ACC-002', 5, 4, 'Defogger Repair Kit', 580.00, 'https://example.com/images/defogger_kit.jpg');

    -- TABLE: product_variants
    INSERT INTO 
        product_variants (product_variant_id, variant_name)
    VALUES
        (1, 'Standard'),
        (2, 'OEM'),
        (3, 'Premium'),
        (4, 'Universal');

    -- TABLE: product_materials
    INSERT INTO 
        product_materials (product_material_id, material)
    VALUES
        (1, 'Laminated Glass'),
        (2, 'Tempered Glass'),
        (3, 'Ceramic Film'),
        (4, 'Plastic Composite'),
        (5, 'Rubber and Metal Composite');

    -- TABLE: inventory
    INSERT INTO 
        inventory (inventory_id, nixar_product_sku, current_stock, min_threshold, updated_at)
    VALUES
        (1, 'NX-GLS-001', 8, 2, '2025-10-13 09:00:00'),
        (2, 'NX-GLS-002', 10, 3, '2025-10-13 09:05:00'),
        (3, 'NX-GLS-003', 6, 2, '2025-10-13 09:10:00'),
        (4, 'NX-GLS-004', 15, 4, '2025-10-13 09:15:00'),
        (5, 'NX-GLS-005', 14, 4, '2025-10-13 09:20:00'),
        (6, 'NX-MIR-001', 20, 5, '2025-10-13 09:25:00'),
        (7, 'NX-MIR-002', 18, 5, '2025-10-13 09:30:00'),
        (8, 'NX-MIR-003', 12, 3, '2025-10-13 09:35:00'),
        (9, 'NX-MIR-004', 10, 3, '2025-10-13 09:40:00'),
        (10, 'NX-TNT-001', 30, 8, '2025-10-13 09:45:00'),
        (11, 'NX-TNT-002', 28, 8, '2025-10-13 09:50:00'),
        (12, 'NX-TNT-003', 25, 8, '2025-10-13 09:55:00'),
        (13, 'NX-TNT-004', 22, 8, '2025-10-13 10:00:00'),
        (14, 'NX-ACC-001', 40, 10, '2025-10-13 10:05:00'),
        (15, 'NX-ACC-002', 35, 8, '2025-10-13 10:10:00');

    -- TABLE: product_suppliers
    INSERT INTO 
        product_suppliers (product_supplier_id, nixar_product_sku, supplier_id, mark_up_price)
    VALUES
        (1, 'NX-GLS-001', 1, 8900.00),
        (2, 'NX-GLS-002', 1, 8200.00),
        (3, 'NX-GLS-003', 2, 9600.00),
        (4, 'NX-GLS-004', 2, 4600.00),
        (5, 'NX-GLS-005', 2, 4600.00),
        (6, 'NX-MIR-001', 3, 3400.00),
        (7, 'NX-MIR-002', 3, 3400.00),
        (8, 'NX-MIR-003', 3, 3700.00),
        (9, 'NX-MIR-004', 3, 3700.00),
        (10, 'NX-TNT-001', 4, 2700.00),
        (11, 'NX-TNT-002', 4, 3000.00),
        (12, 'NX-TNT-003', 4, 3250.00),
        (13, 'NX-TNT-004', 4, 3350.00),
        (14, 'NX-ACC-001', 5, 850.00),
        (15, 'NX-ACC-002', 5, 620.00);

    -- TABLE: suppliers
    INSERT INTO 
        suppliers (supplier_id, name, contact_no)
    VALUES
        (1, 'AutoGlass Depot PH', '09171234567'),
        (2, 'CarPro Distributors', '09283456789'),
        (3, 'TintTech Supplies', '09394561234'),
        (4, 'VisionParts Imports', '09505672345'),
        (5, 'ClearView Enterprise', '09616783456');
