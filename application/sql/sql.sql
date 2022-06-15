Drop schema if exists `on_market`;
create schema if not exists `on_market`;
use `on_market`;

create table if not exists `User`
(
    `id`                    int(11) primary key auto_increment,
    `email`                 varchar(255) unique                                  not null,
    `password`              varchar(255)                                         not null,
    `main_personal_info_id` int(11)                                              not null,
    `status`                enum ('awaiting_verification', 'active', 'inactive') not null default 'awaiting_verification',
    `registered_at`         datetime                                                      default NOW(),
    `last_login`            datetime                                                      default NULL
);

create table if not exists `UserVerificationToken`
(
    id      int auto_increment primary key,
    user_id int(11)             not null,
    token   varchar(255) unique not null
);

create table if not exists `PersonalInfo`
(
    `id`           int(11) primary key auto_increment,
    `first_name`   varchar(100) not null,
    `last_name`    varchar(100) not null,
    `phone_number` varchar(9)   not null,
    `mail`         varchar(255) null,
    `address`      text         not null,
    `city`         varchar(120) not null,
    `country`      varchar(70)  not null,
    `user_id`      int(11)      null
);

create table if not exists `Shop`
(
    `id`           int(11) primary key auto_increment,
    `phone_number` varchar(9),
    `address`      text         not null,
    `city`         varchar(120) not null,
    `country`      varchar(70)  not null
);

# permissions is going to be stored in json format
create table if not exists `Role`
(
    `id`          int(11) primary key auto_increment,
    `role`        varchar(150) not null,
    `permissions` longtext     not null default '["Any"]'
);

insert into `Role`(`role`, `permissions`)
values ('platform_manager', '["Any", "SuperAdmin"]'),
       ('direction', '["Any"]'),
       ('accounting', '["Any"]'),
       ('manager', '["Any"]'),
       ('cashier', '["Any"]'),
       ('repositions', '["Any"]'),
       ('sellers', '["Any"]');

create table if not exists `Employee`
(
    `id`      int(11) primary key auto_increment,
    `user_id` int(11)     not null,
    `shop_id` int(11)     null,
    `nib`     varchar(21) not null
);

create table if not exists `EmployeeRole`
(
    `role_id`     int(11) not null,
    `employee_id` int(11) not null,
    primary key (`role_id`, `employee_id`)
);

create table if not exists `EmployeeEntry`
(
    `id`          int(11) primary key auto_increment,
    `employee_id` int(11) not null,
    `entry_hours` time,
    `exit_hours`  time,
    `entry_date`  date,
    `total_hours` float
);

create table if not exists `Category`
(
    `id`         int(11) primary key auto_increment,
    `parent_id`  int(11) not null,
    `title`      varchar(100),
    `meta_title` varchar(100),
    `content`    text
);

create table if not exists Category
(
    id         int(11) primary key auto_increment,
    title      varchar(100),
    meta_title varchar(100),
    content    text
);

create table if not exists `Campaign`
(
    `id`          int(11) primary key auto_increment,
    `title`       varchar(100) not null,
    `description` varchar(120) not null,
    `thumbnail`   varchar(255) not null,
    `href`        varchar(255) not null,
    `discount_id` int(11)      not null
);

create table if not exists `Discount`
(
    `id`        int(11) primary key auto_increment,
    `active`    bit   not null default 1,
    `discount`  float not null,
    `starts_at` date  not null,
    `ends_at`   date  not null
);

create table if not exists `Promocode`
(
    `id`          int(11) primary key auto_increment,
    `promocode`   varchar(80) not null,
    `discount_id` int(11)     not null
);

create table if not exists `Barcode`
(
    `id`      int(11) primary key auto_increment,
    `barcode` text,
    `type`    enum ('card', 'product') not null,
    `item_id` int(11)                  not null
);

create table if not exists `Card`
(
    `id`               int(11) primary key auto_increment,
    `user_id`          int(11) null,
    `rfid`             varchar(70),
    `nif`              varchar(9),
    `personal_info_id` int(11) null
);

create table if not exists `Product`
(
    `id`          int(11) primary key auto_increment,
    `reference`   varchar(15) unique not null,
    `title`       varchar(80)        not null,
    `meta_title`  varchar(80)        not null,
    `description` text               not null,
    `type`        varchar(50)        null,
    `price`       float              not null,
    `created_at`  datetime           not null default NOW(),
    `updated_at`  datetime           null
);

create table if not exists `ProductReview`
(
    `id`         int(11) primary key auto_increment,
    `product_id` int(11)  not null,
    `user_id`    int(11)  not null,
    `rating`     float    not null,
    `created_at` datetime not null default NOW(),
    `updated_at` datetime null
);

create table if not exists `ProductImages`
(
    `id`         int(11) primary key auto_increment,
    `product_id` int(11)      not null,
    `path`       varchar(255) not null
);

create table if not exists `ProductQuantity`
(
    `product_id`         int(11) not null,
    `shop_id`            int(11) not null,
    `quantity`           int(11) not null,
    `available_quantity` int(11) not null,
    primary key (`product_id`, `shop_id`)
);

create table if not exists `ProductMeta`
(
    `id`         int(11) primary key auto_increment,
    `product_id` int(11)     not null,
    `key`        varchar(50) not null,
    `content`    text
);

create table if not exists `ProductDiscount`
(
    `product_id`  int(11) not null,
    `discount_id` int(11) not null,
    primary key (`product_id`, `discount_id`)
);

create table if not exists `ProductCategory`
(
    `product_id`  int(11) not null,
    `category_id` int(11) not null,
    primary key (`product_id`, `category_id`)
);

create table if not exists `ProductTag`
(
    `product_id` int(11) not null,
    `tag_id`     int(11) not null,
    primary key (`product_id`, `tag_id`)
);

create table if not exists `Purchase`
(
    `id`          int(11) primary key auto_increment,
    `shop_id`     int(11) not null,
    `operator_id` int(11) null,
    `bought_at`   datetime default NOW(),
    `sub_total`   float   not null,
    `total`       float   not null,
    `card_id`     int(11) null
);

create table if not exists `PurchaseItem`
(
    `id`          int(11) primary key auto_increment,
    `purchase_id` int(11) not null,
    `product_id`  int(11) not null,
    `total`       float   not null,
    `quantity`    float   not null,
    `discount_id` int(11) null
);

create table if not exists `Cart`
(
    `id`               int(11) primary key auto_increment,
    `user_id`          int(11)                                                       not null,
    `status`           enum ('checkout', 'awaiting_payment_confirmation', 'ordered') not null default 'checkout',
    `personal_info_id` int(11)                                                       not null,
    `created_at`       datetime                                                      not null
);

create table `CartItem`
(
    `id`          int(11) auto_increment primary key,
    `product_id`  int(11)  not null,
    `discount_id` int(11)  not null,
    `cart_id`     int(11)  not null,
    `quantity`    int(11)  not null,
    `active`      bit      not null default 1,
    `price`       float    not null,
    `created_at`  datetime not null default NOW()
);

create table if not exists `Order`
(
    `id`               int(11) primary key auto_increment,
    `reference`        varchar(15) unicode                                           not null,
    `user_id`          int(11)                                                       not null,
    `status`           enum ('received', 'awaiting_shipping', 'shipped', 'complete') not null default 'received',
    `sub_total`        float                                                         not null,
    `shipping`         float                                                         not null,
    `total`            float                                                         not null,
    `promocode`        varchar(80)                                                   null,
    `discount_id`      int(11)                                                       null,
    `personal_info_id` int(11)                                                       not null,
    `created_at`       datetime                                                      not null default NOW()
);

create table if not exists `OrderItem`
(
    `id`          int(11) primary key auto_increment,
    `product_id`  int(11)  not null,
    `order_id`    int(11)  not null,
    `total`       float    not null,
    `discount_id` int(11)  null,
    `quantity`    float    not null,
    `created_at`  datetime not null default NOW()
);

create table if not exists `Transaction`
(
    `id`         int(11) primary key auto_increment,
    `user_id`    int(11)                     not null,
    `order_id`   int(11)                     not null,
    `payment_id` varchar(150),
    `type`       varchar(10)                 not null,
    `mode`       enum ('paypal', 'card')     not null,
    `status`     enum ('active', 'inactive') not null default 'active',
    `created_at` datetime                    not null default NOW(),
    `updated_at` datetime                    null
);

create table if not exists `UsersTokens`
(
    id      int auto_increment primary key,
    user_id int(11)             not null,
    token   varchar(255) unique not null
);

create table if not exists `Logs`
(
    id        int(11) primary key auto_increment,
    logged_at datetime not null default NOW(),
    log       longtext not null
);