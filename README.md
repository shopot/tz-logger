# tz-logger

## Задача

Без использования сторонних библиотек написать компонент
для логирования требующийся для запуска данного файла.
Компонент должен поддерживать разные обработчики (handlers):
логирование в файл (FileHandler), логирование в syslog (SysLogHandler),
логгер который ничего не делает (FakeHandler).
 
## Основные требования:
* аккуратность, чистота кода
* комментарии в коде для непонятных участков
 
Результатом выполнение программы должно быть:
2 записи в syslog (не обязательно, главное реализовать логгер) и 3 файла
 
### Файл application.log
```
2016-05-30 09:50:57  001  ERROR  Error message
2016-05-30 09:50:57  001  ERROR  Error message
2016-05-30 09:50:57  002  INFO  Info message
2016-05-30 09:50:57  002  INFO  Info message
2016-05-30 09:50:57  003  DEBUG  Debug message
2016-05-30 09:50:57  003  DEBUG  Debug message
2016-05-30 09:50:57  004  NOTICE  Notice message
2016-05-30 09:50:57  004  NOTICE  Notice message
2016-05-30 09:50:57  002  INFO  Info message from FileHandler
2016-05-30 09:50:57  002  INFO  Info message from FileHandler
```# tz-logger

## Задача

Без использования сторонних библиотек написать компонент
для логирования требующийся для запуска данного файла.
Компонент должен поддерживать разные обработчики (handlers):
логирование в файл (FileHandler), логирование в syslog (SysLogHandler),
логгер который ничего не делает (FakeHandler).
 
## Основные требования:
* аккуратность, чистота кода
* комментарии в коде для непонятных участков
 
Результатом выполнение программы должно быть:
2 записи в syslog (не обязательно, главное реализовать логгер) и 3 файла
 
### Файл application.log
```
2016-05-30 09:50:57  001  ERROR  Error message
2016-05-30 09:50:57  001  ERROR  Error message
2016-05-30 09:50:57  002  INFO  Info message
2016-05-30 09:50:57  002  INFO  Info message
2016-05-30 09:50:57  003  DEBUG  Debug message
2016-05-30 09:50:57  003  DEBUG  Debug message
2016-05-30 09:50:57  004  NOTICE  Notice message
2016-05-30 09:50:57  004  NOTICE  Notice message
2016-05-30 09:50:57  002  INFO  Info message from FileHandler
2016-05-30 09:50:57  002  INFO  Info message from FileHandler
```

### Файл application.error.log
```
2016-05-30 09:50:57  [001]  [ERROR]  Error message
2016-05-30 09:50:57  [001]  [ERROR]  Error message
```
 
### Файл application.info.log
```
2016-05-30 09:50:57  [002]  [INFO]  Info message
2016-05-30 09:50:57  [002]  [INFO]  Info message
```
 
## Формат записи в файл:
{дата} {код уровня логирования} {уровень логирования} {сообщение}

### Файл application.error.log
*****************
2016-05-30 09:50:57  [001]  [ERROR]  Error message
2016-05-30 09:50:57  [001]  [ERROR]  Error message
*****************
 
### Файл application.info.log
*****************
2016-05-30 09:50:57  [002]  [INFO]  Info message
2016-05-30 09:50:57  [002]  [INFO]  Info message
*****************
 
## Формат записи в файл:
{дата} {код уровня логирования} {уровень логирования} {сообщение}
 

Формат записи в файл:
{дата} {код уровня логирования} {уровень логирования} {сообщение}
 
