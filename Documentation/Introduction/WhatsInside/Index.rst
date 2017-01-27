What's inside?
--------------

- **GeoPicker** a wizard that will allow you to choose the location on the Google Map (also with elevation if required)
- Validators for latitude and longitude fields in decimal format.
	- **tx_geopicker_lat_eval** accepts values from -90° to 90°
	- **tx_geopicker_lon_eval** accepts values from -180° to 180°
- Shared LL labels for these fields - if your extension contains several models with GPS coordinates, you don't need to localize it yourself, and can use available labels (check the samples and **typo3conf/ext/geopicker/Resources/Private/Language/locallang_db.xlf** file), fill free to localize these into your language at the TYPO3 localization server!
- Some static methods to convert decimal coordinates to other notations, i.e. :samp:`47.212529, 8.559082` to
	- **DMS:** :samp:`47° 12′ 45.1″ N, 8° 33′ 32.7″ E`
	- **DM:** :samp:`47° 12.752′ N, 8° 33.545′ E`
- ViewHelpers for validating and formatting coordinates.
- LL labels with some typical descriptions available as ViewHelper for the frontend, sample: :samp:`<geopicker:translate key='title.coordinatesDMS'/>` displays description **Degrees, minutes, seconds (DD° MM′ SS″)**


