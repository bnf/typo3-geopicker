Validation
----------

There are available two validators for your BE form

- **tx_geopicker_lat_eval** accepts values from -90° to 90°
- **tx_geopicker_lon_eval** accepts values from -180° to 180°

For elevation field you can use just :samp:`int` validator of TYPO3, in all cases you can use also :samp:`required` validator.

In ViewHelpers section you'll find also VH's to validate coordinates in your view.