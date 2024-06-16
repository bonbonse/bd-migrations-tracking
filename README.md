# Отслеживание изменений БД с помощью миграций

### Внимание! На данный момент, проект работает некорректно. Скоро исправлю

## Локальный запуск

### Docker
```shell
# Клонируем репозиторий
git clone https://github.com/bonbonse/bd-migrations-tracking.git ./

# Создаем файл с переменными окружения
cp .env.example .env

# Запускаем проект 
cd docker
docker-compose up -d
```

