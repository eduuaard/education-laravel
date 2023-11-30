## ✨ Tio Educação


## 🚀 How to Use

1. **Clone Repository or Download**
    ```bash
    git clone https://github.com/eduuaard/education-laravel.git
    ```
    
2. **Setup**
    ```bash
    # Go into the repository
    cd education-laravel

    # Install dependencies
    composer install

    # Open with your text editor
    code .
    ```
   
3. **.ENV**
    Rename or copy the `.env.example` file to `.env`
    ```bash
    # Generate app key
    php artisan key:generate
    ```

4. **Setup Database**
    Setup your database credentials in your `.env` file.

5. **Seed Database**
    ```bash
    php artisan migrate:fresh --seed
    ```
   *Note: If showing an error, please try to rerun this command.*


7. **Run Server**
    ```bash
    php artisan serve
    ```

9. **Login**
    Try login with username: `teste@educacao.com` and password: `password`


