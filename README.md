
# Billers PHP Laravel

------

(SCRIPT MASIH DALAM PEMBUATAN)

Aplikasi penjualan produk PPOB.

### Instalasi

---
Sama seperti instalasi laravel https://laravel.com/docs/9.x/deployment#server-configuration

Jangan lupa setting .env


NGINX Conf
```text
server {
    listen 80;
    listen [::]:80;
    server_name example.com;
    root /srv/example.com/public;
 
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
 
    index index.php;
 
    charset utf-8;
 
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
 
    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }
 
    error_page 404 /index.php;
 
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
 
    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```


*** Cron Job ***

Jika hosting anda tidak mendukung cron, anda bisa menjalankan menggunakan pihak ketiga dengan cara mengakses url berikut.
````text
https://ganti-dengan-alamat-website.kamu/cron-job 
menjalankan:
- php artisan update:transactions
- php artisan update:products

https://ganti-dengan-alamat-website.kamu/cron-job?action=update-transactions
menjalankan:
- php artisan update:transactions

https://ganti-dengan-alamat-website.kamu/cron-job?action=update-products
menjalankan:
- php artisan update:products
````

### PRODUK

-------

**Semua produk prepaid**
- Pulsa
- Paket Data
- E-money
- Game
- Paket SMS & Telepon
- PLN
- dan lainnya

**Semua produk prepaid**
- masih dalam proses pembuatan

### Metode Pembayaran

----

Saat Ini Sudah Mendukung metode pembayaran yang ada dibawah ini.
- BUSD (BEP20) - Binance Smartchain	
- IDK (ERC20) - Ethereum Network	
- IDK (XLM) - Stellar Lumen	
- USDC (ERC20) - Ethereum Network	
- USDP Pax Dollar (ERC20) - Ethereum Network	
- USDT (BEP20) - Binance Smartchain	
- USDT (ERC20) - Ethereum Network	
- USDT (TRC20) - Tron Network	
- ATM Bersama	
- Bank Artha Graha	
- CIMB Niaga Virtual Account	
- BCA Virtual Account	
- BRI Virtual Account
- Permata Bank Virtual Account
- BNI Virtual Account	
- Mandiri Virtual Account	
- Bank Neo Commerce/BNC	
- Bank Sahabat Sampoerna	
- Maybank Virtual Account	
- POS Indonesia	
- Pegadaian / Alfamart / Pos Indonesia
- Indomaret	
- DANA
- LinkAja Apps (Percentage Fee)	
- LinkAja Apps (Fixed Fee)	
- OVO (Support Void)	
- Shopee Pay Apps (Support Void)	
- Shopee Pay Account Link	
- Indodana Paylater	
- QRIS LinkAja
- QRIS Nobu
- QRIS Shopee Pay
- Kartu Kredit (Visa / Master Card / JCB)	