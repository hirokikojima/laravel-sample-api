# laravel-sample-api

## launch in local
```
cd local
docker-compose up -d
```

## deploy
### environments
- production
- development
### Command
```
cd src
./vendor/bin/dep deploy <environment> --branch="<branch_name>"
```

## api documents
### generate command
```
cd src
./vendor/bin/openapi ./app --output ./storage/api/
```