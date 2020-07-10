# Laravel Schema Extractor
Get an array looking something like:

```json
[
    {
        "model": "App\\User",
        "table": "users",
        "columns": {
            "id": {
                "name": "id",
                "type": {},
                "default": null,
                "notnull": true,
                "length": null,
                "precision": 10,
                "scale": 0,
                "fixed": false,
                "unsigned": false,
                "autoincrement": true,
                "columnDefinition": null,
                "comment": null
            },
            "name": {
                "name": "name",
                "type": {},
                "default": null,
                "notnull": true,
                "length": null,
                "precision": 10,
                "scale": 0,
                "fixed": false,
                "unsigned": false,
                "autoincrement": false,
                "columnDefinition": null,
                "comment": null,
                "collation": "BINARY"
            },
        
            ...
]
```


## Thanks
Based almost entirely on [mpociot/laravel-test-factory-helper](https://github.com/mpociot/laravel-test-factory-helper)

## License

MIT
