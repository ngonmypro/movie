# INSTALL Software
   1. Composer
   2. NodeJS
   3. PHP
   4. MySQl


# Set and Install Project
   1. npm run install
   2. composer install


# Set Database and .env
    1. Create DB name => movie
    2. Set DB_USERNAME=root # Config device
    3. Set DB_PASSWORD=P@ssw0rd # Config device


# Step Run Project
    1. npm run dev
    2. php artisan serve
    3. php artisan migrate
    4. php artisan db:seed --class=DatabaseSeeder
    5. Open link server started


# วิธีใช้งาน
    1. เปิด Link ขึ้นมาถึงจะเห็นหน้ารายการหนัง โดยสามารถคลิ๊กเข้าไปดูรายละเอียดผ่านผ่านแต่ละกรอบได้เลย
    2. พอเข้าไปดูรายละเอียดหนังแล้ว จะมี Comment ที่ได้โพสต์ไว้แล้ว แต่จะไม่สามารถโพสต์ได้หากยังไม่ได้ทำการ Loging เข้าระบบ
    3. พอ Login เข้าระบบแล้ว จะมี Menu ให้ Manage อยู่ 2 เมนู หากอยากกลับไปดูหน้ารายการหนังให้ คลิ๊กที่ Movie ได้เลย
    4. เมนู Manage จะมีไว้ Manage Movie และ User โดยในแต่ละเมนูจะ สามารถ เพิ่ม ลบ แก้ไข และดูรายละเอียดได้
