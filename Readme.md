# PHP with Google Cloud Storage and SQL Cloud

Source: https://cloud.google.com/storage/docs/reference/libraries#client-libraries-install-php

## Setting up authentication

In the Cloud Console, go to the Create service account key page.

- Go to the Create Service Account Key page
- From the Service account list, select New service account.
- In the Service account name field, enter a name.
- From the Role list, select Project > Owner.
- Click Create. A JSON file that contains your key downloads to your computer.

- setting the environment variable GOOGLE_APPLICATION_CREDENTIALS
```
set GOOGLE_APPLICATION_CREDENTIALS="/path/to/file.json"
```

## Installing the client library

- Install composer

https://getcomposer.org/download/

```
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
$ php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
$ php composer-setup.php
$ php -r "unlink('composer-setup.php');"
$ mv composer.phar composer
```

- Install google/cloud-storage
```
./composer require google/cloud-storage
```

## Using the client library

See examples (NOTE: Change upercase strings with appropiated values).