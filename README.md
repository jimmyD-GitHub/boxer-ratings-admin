# boxer-ratings-admin

A back end admin application for BoxerRatings.com

## Configuration
This is a symfony web application that requires the following environment variables:

```.dotenv
# Typical development environment variables...

APP_ENV=dev
APP_SECRET=61a46ccf7636cdb7eec66f67b828b193
DATABASE_URL=mysql://root@mysql:3306/boxers
```

## Development
All the JS and CSS is bundled together using yarn and encore/webpack magic documented here:

https://symfony.com/doc/current/frontend/encore/simple-example.html

The CRUD web pages are generated using Doctrine entities with the EasyAdmin bundle:

https://symfony.com/doc/master/bundles/EasyAdminBundle/index.html

This project acts a back end admin application for the Docker development environment. 

Use docker-compose to build and run it from your docker host:

```shell script
$ docker-compose up --build -d
```

To push a rebuilt version of the image just do:

```shell script
$ docker push jimmydockerhub/boxer-ratings-admin:latest
```

## Production

The admin.boxeratings.com application is hosted on AWS using CloudFormation, S3 and CloudFront.

## Deployment

To build the assets files do:

```shell script
$ yarn encore production
```

To push the JS and CSS files to assets.boxeratings.com do:

```shell script
$ php bin/console app:deploy-assets
```

There is a handy composer command that does both of these together:

```shell script
$ composer assets-deploy
```

To deploy to admin.boxeratings.com running on an AWS Lambda using serverless do:

```shell script
$ composer app-deploy
```