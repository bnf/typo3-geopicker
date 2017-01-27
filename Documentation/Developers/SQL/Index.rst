SQL and formats
---------------

Coordinates format and accuracy
===============================

There are several known ways to write coordinates of point on our globe, and 3 of them are handled by this extension,
first, basic in this case is DD.DDDDDD° and we will use it to store the coordinates into database.
Why? Because it's just numeric format and what's more i.e Google Maps API uses it to create new latLng object.

No need for adding degrees, minutes, seconds symbols, no need to use direction symbols (N/S , E/W), just numbers.

All validators, rounders and other tools used in the GeoPicker uses 6 decimal places for coordinates, its accuracy is about 11cm
on the equator and it's suitable for most private solutions. If you are member of the military sector fill free to contact me - I'll create version more accurate for your needs ;)

Sample SQL fields
=================

There are SQL fields definition which suits well the GeoPicker format, you can just copy it to your extension.

Remember that in coordinates 0 is a value too! (i.e. point with lat=0, lon=0 is some place on the Atlantic ocean ;)) therefore you should use nullable fields for records without coordinates.

The same with elevation, 0 or negative values are value to! There are places on our planet with elevation below sea level!

.. code-block:: sql

  CREATE TABLE tx_yourext_domain_model_point (
    ...
    latitude float(10,6) DEFAULT NULL,
    longitude float(10,6) DEFAULT NULL,
    elevation int(11) DEFAULT NULL,
    ...
  );