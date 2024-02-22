-- Based on ER Diagram Ver 2.9
-- Updated on 11/09
-- Latest ER Diagram Link: https://lucid.app/lucidchart/aa83eff1-be50-4570-9637-b3db06b0e19f/edit?viewport_loc=82%2C31%2C2015%2C968%2C0_0&invitationId=inv_b0b43110-f8b8-4977-a948-84a193328061

-- To allow unauthenticated users to access these URLs, edit the relevant Controller
-- and add the following to the initialize function:
-- $this->Authentication->allowUnauthenticated(['view', 'index']);

-- After the CREATE TABLEs there are test datas to insert


CREATE TABLE invoices(
    id              char(36)        NOT NULL ,
    reference        char(36),
    reference_type  ENUM('MovingOrder', 'StorageOrder'),
    invoice_amount  decimal(7,2)    DEFAULT 0.00,
    invoice_date    timestamp       DEFAULT current_timestamp(),
    user_id         char(36)        NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE users (
    id              char(36)        NOT NULL     ,
    user_name       varchar(64)     NOT NULL,
    email           varchar(254)    NOT NULL    UNIQUE,
    password        varchar(64)     NOT NULL,
    nonce           varchar(255)    DEFAULT NULL,
    nonce_expiry    datetime        DEFAULT NULL,
    user_phone      char(10)        NOT NULL    UNIQUE,
    user_type       ENUM('individual', 'business', 'other') NOT NULL DEFAULT 'individual',
    user_level      ENUM('customer', 'admin')   NOT NULL    DEFAULT 'customer',
    user_company    varchar(32)     DEFAULT NULL,
    PRIMARY KEY (id)

);

CREATE TABLE staffs (
    id              char(36)        NOT NULL     ,
    staff_name      VARCHAR(64)     NOT NULL,
    staff_phone     CHAR(10)        NOT NULL    ,
    staff_email     VARCHAR(254)    NOT NULL    UNIQUE,

    PRIMARY KEY (id)
);

INSERT INTO staffs (`id`,`staff_name`,`staff_phone`,`staff_email`)
VALUES
    ('123456789123456789123456789123456789',"Default Staff","0000000000","unassigned@void.com");

CREATE TABLE vehicles (
    id              char(36)        NOT NULL     ,
    vehicle_rego    varchar(6)      NOT NULL    UNIQUE,
    vehicle_type    ENUM('UTE', 'Small Box Truck', 'Large Box Truck', 'Dump Truck')  NOT NULL DEFAULT 'UTE',
    vehicle_model   varchar(32)     DEFAULT NULL,
    PRIMARY KEY (id)
);

-- From here down related to the moving service

CREATE TABLE moving_orders (
    id              char(36)        NOT NULL     ,
    mo_order_time   timestamp       NOT NULL    DEFAULT current_timestamp(),
    mo_update       timestamp       NOT NULL    DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    mo_detail       VARCHAR(512)    NOT NULL,
    mo_pickup       varchar(128)    NOT NULL,
    mo_dropoff      varchar(128)    DEFAULT NULL,
    mo_start_time   datetime        DEFAULT NULL,
    mo_end_time     datetime        DEFAULT NULL,
    mo_quote        decimal(8,2)    DEFAULT 0.00,
    user_id         char(36)        NOT NULL ,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE moving_orders_staffs (
    id              char(36)        NOT NULL     ,
    mo_staff_status ENUM('assigned', 'working', 'finished') DEFAULT 'assigned',
    mo_staff_update timestamp       NOT NULL    DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    staff_id      char(36)        NOT NULL ,
    moving_order_id char(36)        NOT NULL ,
    PRIMARY KEY (id),
    FOREIGN KEY (staff_id) REFERENCES staffs (id),
    FOREIGN KEY (moving_order_id) REFERENCES moving_orders (id)
);

CREATE TABLE moving_orders_vehicles (
    id              char(36)        NOT NULL     ,
    mo_vehicle_status ENUM('assigned', 'working', 'finished') DEFAULT 'assigned',
    mo_vehicle_update timestamp       NOT NULL    DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    vehicle_id      char(36)        NOT NULL ,
    moving_order_id char(36)        NOT NULL ,
    PRIMARY KEY (id),
    FOREIGN KEY (vehicle_id) REFERENCES vehicles (id),
    FOREIGN KEY (moving_order_id) REFERENCES moving_orders (id)
);

-- From here down related to the moving service

CREATE TABLE stores (
    id              char(36)        NOT NULL     ,
    store_name      varchar(32)     NOT NULL ,
    store_address   varchar(128)    NOT NULL ,
    store_open      time            NOT NULL ,
    store_close     time            NOT NULL ,
    store_phone     char(10)        NOT NULL ,
    PRIMARY KEY (id)
);

CREATE TABLE units (
    id              char(36)        NOT NULL,
    unit_no     varchar(5)      NOT NULL ,
    unit_area      decimal(4,1)    NOT NULL  DEFAULT 0.00,
    unit_type       ENUM('Locker', 'Small', 'Medium', 'Large', 'Other') DEFAULT 'Other',
    unit_price      decimal(5,2)    NOT NULL     DEFAULT 0.00,
    unit_desc       varchar(255)    DEFAULT NULL,
    unit_avail      boolean         DEFAULT 1,
    store_id        char(36)        NOT NULL ,
    PRIMARY KEY (id),
    FOREIGN KEY (store_id) REFERENCES stores (id)
);

CREATE TABLE storage_orders (
    id              char(36)        NOT NULL     ,
    so_order_time   timestamp       NOT NULL    DEFAULT current_timestamp(),
    so_update       timestamp       NOT NULL    DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    so_start        date            NOT NULL ,
    so_duration     int             NOT NULL    DEFAULT 4,
    so_price        decimal(8,2)    NOT NULL ,
    user_id         char(36)        NOT NULL ,
    unit_id         char(36)        NOT NULL ,
    staff_id        char(36)        NOT NULL    DEFAULT '123456789123456789123456789123456789',
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (unit_id) REFERENCES units (id),
    FOREIGN KEY (staff_id) REFERENCES staffs (id)
);

CREATE TABLE inquiries (
    id              char(36)        NOT NULL     ,
    inquiry_order_time   timestamp       NOT NULL    DEFAULT current_timestamp(),
    inquiry_update       timestamp       NOT NULL    DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    inquiry_detail       VARCHAR(512)    NOT NULL,
    inquiry_pickup       varchar(128)    NOT NULL,
    inquiry_dropoff      varchar(128)    DEFAULT NULL,
    inquiry_start_time   datetime        DEFAULT NULL,
    inquiry_end_time     datetime        DEFAULT NULL,
    inquiry_quote        decimal(8,2)    DEFAULT 0.00,
    inquiry_vehicle      int             DEFAULT 0,
    inquiry_staff        int             DEFAULT 0,
    inquiry_reviewed     boolean            DEFAULT false,
    inquiry_confirmed    boolean            DEFAULT false,
    user_id         char(36)        NOT NULL ,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users (id)
);



CREATE TABLE contact_forms (
    id              char(36)        NOT NULL,
    contact_name    varchar(32)     NOT NULL ,
    contact_email   varchar(254)    NOT NULL ,
    contact_phone   char(10)        NOT NULL ,
    contact_msg     text            NOT NULL ,
    contact_replied boolean         DEFAULT 0,
    PRIMARY KEY (id)
);


CREATE TABLE content_blocks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) NOT NULL,
    description TEXT,
    slug VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    value TEXT,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Test data

-- templates for 20 demo users, including demo admin and demo customer
-- need to fix password hashing

INSERT INTO users (`id`,`user_name`,`email`,`password`,`user_phone`,`user_type`,`user_level`)
VALUES
    -- Demo Admin Below
    (UUID(),"Admin Test","admin@test.com","password","0000000000","other","admin"),
    -- Demo User Below
    (UUID(),"Customer Test","customer@test.com","password","1111111111","individual","customer"),
    (UUID(),"Calvin Mcintosh","auctor.mauris.vel@protonmail.couk","QBF11BOH2CL","0438741727","individual","customer"),
    (UUID(),"Vincent Vinson","arcu.vestibulum.ante@yahoo.couk","UMQ83EUA7LV","0427863831","business","customer"),
    (UUID(),"Zeus Mckinney","sit.amet.lorem@protonmail.org","QWP34WMZ4CL","0497535424","individual","customer"),
    (UUID(),"Aimee Foley","cum.sociis@yahoo.edu","WOT40CMH6JM","0478554774","individual","customer"),
    (UUID(),"Joel Olsen","semper.cursus@yahoo.org","UYY54AWT7UL","0475782627","individual","customer"),
    (UUID(),"Prescott Thornton","pede.malesuada@outlook.ca","PHY04JHQ8JV","0440767825","individual","customer"),
    (UUID(),"Steven Cooke","cras.dolor@aol.couk","ROB58TIZ5MG","0423670738","individual","customer"),
    (UUID(),"Kennedy Joyner","dignissim.pharetra@aol.com","UAN01QFU5FY","0491723431","individual","customer");

INSERT INTO users (`id`,`user_name`,`email`,`password`,`user_phone`,`user_type`,`user_level`)
VALUES
    (UUID(),"Moana Greene","curabitur@protonmail.net","KXV05PJO8NN","0456268975","individual","customer"),
    (UUID(),"Nehru Guzman","enim.curabitur.massa@yahoo.net","DKJ66XHM4HV","0495839439","business","customer"),
    (UUID(),"Abel Greene","urna@outlook.com","TJQ75HYH0UN","0436709853","business","customer"),
    (UUID(),"Mary Langley","curabitur@icloud.net","YPJ29XMQ2NO","0441727618","business","customer"),
    (UUID(),"Kenyon Kirkland","pulvinar.arcu@protonmail.org","RDH48DUP3JB","0423462097","business","customer"),
    (UUID(),"Barclay Kirkland","varius@yahoo.org","SWZ57UKH7KU","0455254410","individual","customer"),
    (UUID(),"Nigel Carpenter","sollicitudin.a.malesuada@protonmail.com","UHV52MIO6LU","0414358382","individual","customer"),
    (UUID(),"Isabelle Bond","nec.ligula@google.com","JEW47WLK5WQ","0457376437","individual","customer"),
    (UUID(),"Lilah Sawyer","non.arcu@protonmail.net","VNT31QBU6EW","0414535426","business","customer"),
    (UUID(),"Castor Newman","pellentesque.ultricies@yahoo.org","DVN16ECL8FA","0434664267","business","customer");


-- templates for 8 demo staffs
INSERT INTO staffs (`id`,`staff_name`,`staff_phone`,`staff_email`)
VALUES
    (UUID(),"Camden Flowers","0447138879","varius@google.ca"),
    (UUID(),"Giacomo Downs","0412280372","praesent.interdum@yahoo.ca"),
    (UUID(),"Colby Marshall","0468834155","nec@hotmail.org"),
    (UUID(),"Lilah Stone","0435280608","vitae@protonmail.net"),
    (UUID(),"Thomas Mayer","0463177866","enim@hotmail.edu"),
    (UUID(),"Carolyn Rasmussen","0497855441","facilisi.sed@icloud.com"),
    (UUID(),"Hamilton Powers","0477754782","magnis.dis.parturient@google.org"),
    (UUID(),"Troy Pollard","0483455753","nisl.sem@google.edu");


-- templates for 5 demo vehicles
INSERT INTO vehicles (`id`,`vehicle_rego`,`vehicle_type`,`vehicle_model`)
VALUES
    (UUID(),"8RR5LF","Dump Truck","Chrysler"),
    (UUID(),"9IY3XD","Dump Truck","Isuzu"),
    (UUID(),"8CG7OJ","UTE","RAM Trucks"),
    (UUID(),"5UK5TO","UTE","Chrysler"),
    (UUID(),"2MQ8IY","Dump Truck","Nissan");

