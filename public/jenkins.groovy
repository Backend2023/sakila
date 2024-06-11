pipeline {
    agent any
    environment {
        GIT_REPO_URL = 'https://github.com/Backend2023/sakila.git' // Replace with your repository URL
        APP_NAME='Sakila Laravel Aplikacija'
    }

    stages {
        stage('Hello') {
            steps {
                echo 'Hello World'
            }
        }
        stage('Install Composer') {
            steps {
                 echo 'Install composer'
             /*   sh '''
                    EXPECTED_SIGNATURE=$(wget -q -O - https://composer.github.io/installer.sig)
                    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
                    ACTUAL_SIGNATURE=$(php -r "echo hash_file('SHA384', 'composer-setup.php');")
                    
                    if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]
                    then
                        >&2 echo 'ERROR: Invalid installer signature'
                        rm composer-setup.php
                        exit 1
                    fi
                    
                    php composer-setup.php --install-dir=/usr/local/bin --filename=composer
                    RESULT=$?
                    rm composer-setup.php
                    exit $RESULT
                '''
                */
            }
        }
         stage('Clone Repository') {
            steps {
                git url: "${GIT_REPO_URL}", branch: 'main' // Replace 'main' with your branch if different
                // Verify the repository has been cloned by listing files
                //sh 'ls -la'
                bat 'dir'
            }
        }

        stage('Install Dependencies') {
            steps {
                 echo 'Install Dependencies'
           //     sh 'composer install' // Assuming Composer is installed on the agent
           bat 'composer install'
            }
        }
        stage('Create .env') {
            steps {
                withCredentials([
                    string(credentialsId: 'db-host', variable: 'DB_HOST'),
                    string(credentialsId: 'db-database', variable: 'DB_DATABASE'),
                    string(credentialsId: 'db-username', variable: 'DB_USERNAME'),
                    string(credentialsId: 'db-password', variable: 'DB_PASSWORD')
                ]) {
                    // writeFile encoding: 'utf-8', file: './test/', text: 'neki text'
                    // Write the .env file
                    writeFile file: '.env', text: """
                    APP_NAME=Laravel
                    APP_ENV=local
                    APP_KEY=base64:SomeRandomString
                    APP_DEBUG=true
                    APP_URL=http://localhost

                    LOG_CHANNEL=stack

                    DB_CONNECTION=mysql
                    DB_HOST=${env.DB_HOST}
                    DB_PORT=3306
                    DB_DATABASE=${env.DB_DATABASE}
                    DB_USERNAME=${env.DB_USERNAME}
                    DB_PASSWORD=${env.DB_PASSWORD}

                    BROADCAST_DRIVER=log
                    CACHE_DRIVER=file
                    QUEUE_CONNECTION=sync
                    SESSION_DRIVER=file
                    SESSION_LIFETIME=120

                    REDIS_HOST=127.0.0.1
                    REDIS_PASSWORD=null
                    REDIS_PORT=6379

                    MAIL_MAILER=smtp
                    MAIL_HOST=smtp.mailtrap.io
                    MAIL_PORT=2525
                    MAIL_USERNAME=null
                    MAIL_PASSWORD=null
                    MAIL_ENCRYPTION=null
                    MAIL_FROM_ADDRESS=null
                    MAIL_FROM_NAME="${APP_NAME}"

                    AWS_ACCESS_KEY_ID=
                    AWS_SECRET_ACCESS_KEY=
                    AWS_DEFAULT_REGION=us-east-1
                    AWS_BUCKET=

                    PUSHER_APP_ID=
                    PUSHER_APP_KEY=
                    PUSHER_APP_SECRET=
                    PUSHER_APP_CLUSTER=mt1

                    MIX_PUSHER_APP_KEY=""
                    MIX_PUSHER_APP_CLUSTER=""
                    """
                }
            }
        }
        stage('Run Migrations') {
            steps {
                script {
                    // Run database migrations, drop existing tables
                    bat "php artisan migrate:fresh"
                }
            }
        }
        stage('Run Seeders') {
            steps {
                script {
                    // Run database migrations
                    bat "php artisan db:seed"
                }
            }
        }       
        stage('Run PHP Unit Tests') {
            steps {
                script {
                    // Run PHP unit tests
                   // bat "php artisan test"
                    bat "php artisan test --filter unit"  // hoćemo samo unit testove
                }
            }
        }
        
        stage('Run Dusk Tests') {
            steps {
                script {
                    // Run Dusk tests
                  //  bat "php artisan dusk"
                   echo 'DUSK test require chromedriver'
                }
            }
        }

    }
}
