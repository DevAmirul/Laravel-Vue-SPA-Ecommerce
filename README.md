# Laravel-Vue-SPA-Ecommerce

SPA Laravel E-commerce project. E-commerce platform with REST Api, Multiple Auth (admin , editor , user) and admin panel integration.

## Features
- Authentication and Authorization (Breeze Starter kit)
- Multiple Authentication (Admin, Editors, Users)
- Search (Name, Tag, SKU)
- Reports
- Chart report
- Add dynamic product Attributes
- Coupon
- Shipping
- payment gateway
- Site settings
- Mobile First Design

  
![Dashboard](https://i.ibb.co/zb5z8jw/spa1.png)

## Run Locally

Clone the project

```bash
  git clone https://github.com/DevAmirul/Laravel-Vue-SPA-Ecommerce.git
```

Go to the project directory

```bash
  cd Laravel-Vue-SPA-Ecommerce
```

Install dependencies

```bash
  composer install
  npm install
```
Create .env file and copy .env.example to .env

Key Generate
```bash
php artisan key:generate
```
Storage Link
```bash
php artisan storage:link
```

```##-Update DB info in .env-##```

Migrate database
```bash
php artisan migrate --seed
```

```bash
php artisan serve
```
Open: http://127.0.0.1:8000


## Screenshots

![Admin Dashboard](https://i.ibb.co/zb5z8jw/spa1.png)
![Orders Table](https://i.ibb.co/LhMVYzY/spa2.png)
![Customers Orders Reports](https://i.ibb.co/9WNRVmw/spa3.png)
![Orders Chart](https://i.ibb.co/phgCVbw/spa7.png)
![Settings](https://i.ibb.co/vsGPXpN/spa5.png)


## Tech Stack

**Client:** Vue.js, Pinia, Axios, Bootstrap, sweetalert2

**Server:** PHP8.2, Laravel10.x, Liveware, Bootstrap


## Authors

- [@devamirul](https://www.github.com/devamirul)
