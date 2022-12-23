<div dir="ltr">
<h1> 
Baba Market
</h1>

<h1>Laravel Ecommerce Shop :shopping:	</h1>

<hr>

<details open>
<summary><h2>Table of Contents</h2></summary>

-   [Introduction](#intro)
-   [Dynamic Menue](#Dynamic-menu):oil_drum:
-   [ Authentication](#Authentication) :man_technologist:
-   [ Admin Panel Features ](#Admin-Panel-Features) :stars:
-   [User Panel Features](#User-Panel-Features) :technologist:
-   [ Helper Functions and Config Files](#Helper-Functions-and-Config-Files)
</details>

<hr>
<details id="intro"> 
<summary><h2>Introduction</h2></summary>
It is an eCommerce website that has created by Laravel. It has a dashboard for admins to manage (CRUD) products and all product dependencies. Users can register at this app, buys products and order products.  
</details>

<hr>

## Dynamic menu

-   In this site menus are dynamic.
-   Admin duty is to insert dynamic menues in the appliction.
-   When menus were created, they store at catch. There is no need to load them from database.
    <br>
    Catch is destroyed automatically. When new menu is created, they form again.

<hr>

## Authentication

For authentication users should register their phone number. The phone number must be uniqe, When user enter a phone number. For verifying user phone number application sends a verify number message to the user phone number. User should enter that message for less than 120 sec. If user lose that time, she/he can ask again for verify message.Right now hasn't used from any Message Service, but All these process are semulated by application.

<details>

<hr>

## Admin Panel Features

### :one: Dashboard

1. Display products numbers
1. Display users numbers
1. Display orders numbers
1. Main menus numbers

### :two: Comments :left_speech_bubble:

1. Seeing new comments
1. Removing Comments
1. Comment confirmation or comment unconfirmation for desplaying bellow the products.
1. Abality to answer the comment.

### :three: Orders :page_with_curl:

#### Orders Types

| #   | Title       | Description                                |
| --- | ----------- | ------------------------------------------ |
| 1   | `new`       | The new order                              |
| 2   | `paid`      | The order price was paid successfully      |
| 3   | `pending`   | Admin has delivered product to the postman |
| 4   | `delivered` | Customer has recieved the product          |
| 5   | `fail`      | The paying has faced with error            |
| 5   | `canceled`  | Paying has canceled by customer            |

#### Seeing All Orders

1. Display orders
1. Admin can see orders details like: product type, price, product value, total price and paying details.

#### Searching on order

-   Admin is able to search on order by Payment Code or Tracking Code
    > Tracking Code: When product price was paiyed successfull, Tracking code sends to customer.
    > Payment Code: A return code from Payment Port, it shows that price has payed successfully.

### :four: Categories :label:

1. Creating adn editing site's main menu.

### :five: Brand :bookmark:

1. Creating and editing brand product.
1. Brand picture upload.

### :six: Color :art:

1. Creating and edinting color.
1. Choosing color code as Hex.

### :seven: Size :straight_ruler:

1. Creating and editing size.

### :eight: City and State :round_pushpin:

1. Creating and editing city
1. Creating and editing state

### :nine: Discounts :ticket:

1.  Ceating and edint discount
1.  Admin can choose different type of discount's banner
1.  Displaying discounts
1.  Choosing discount percentage, start date, and end date.

### :keycap_ten:Products

#### Creating new product

1. Choosing title and slug for a product.
1. Choosing main category and subcategory for a product.
1. adding products details dymanicly.
1. Choosing product color and product size (Optional)
1. Choosing product brand.
1. Specifying product price and product discount in specific period.
1. Choosing products cover.
1. Choosing Product gallary.
1. Product short description.
1. Product log description.

#### Display products

-   Display products with pagination

## User Panel Features

1. Adding product to wish list.
1. Loging and logout.
1. Baying product.
1. Display Product purchesed list.
1. Comment on products.

## Helper Functions and Config Files

<div dir="ltr">

#### Shop Config

</div>

<b>
 Shop config functions have located at config/shop.php. that consist of following functions: 
</b>

1. (pagination): shows how many rows display on the page
1. Setting about about OTP.
1. image upload config.
1. CRUD operations message text.

 </div>
