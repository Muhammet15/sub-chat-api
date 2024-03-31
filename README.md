git clone https://github.com/Muhammet15/chatgpt-api.git
cp .env.example .env
composer i 
php artisan migrate
php artisan db:Seed
php artisan serve

Not:
Projede mvc mimarisini kullandım, git branchler üzerinden commitlerimi yaptım. Api testleri için postman kullandım ve postman collection'ı proje içerisinde klasörledim oradan ulaşabilirsiniz. Aynı zamanda exportladığım db yi de klasör' e ekledim.

Panel:
![image](https://github.com/Muhammet15/chatgpt-api/assets/58929064/bae1d6d7-279d-4fbb-9473-d6825aa81e57)
![image](https://github.com/Muhammet15/chatgpt-api/assets/58929064/f97dd2cb-c2e2-4258-8e9c-cd874bd9c10c)
![image](https://github.com/Muhammet15/chatgpt-api/assets/58929064/13978781-c7c1-4f00-b385-29a1fdd310fe)


