ViewHelpers
-----------

There are several ViewHelpers you can use in your templates, check the actual folder to see what's available, below several samples:

.. code-block:: html


    Elevation in meters
    <geopicker:elevation value="123"/>
    or <geopicker:translate key="elevationMeters" arguments="{0: 123}"/>

    Elevation in feet
    <geopicker:elevation value="123" inFeet="1"/>
    or <geopicker:translate key="elevationFeet" arguments="{0: 123}"/>


    Coordinates in different formats
    <geopicker:coordinates latitude="51.12700180001" longitude="16.345" />
    <geopicker:dmsCoordinates latitude="51.127" longitude="16.345" />
    <geopicker:dmCoordinates latitude="51.127" longitude="16.345" />

    If statements
    <geopicker:ifValid latitude="51.127" longitude="216.345">
        <f:then><geopicker:dmsCoordinates latitude="51.127" longitude="216.345" /></f:then>
        <f:else>You entered wrong coordinates</f:else>
    </geopicker:ifValid>

    <geopicker:ifValid latitude="51.127" longitude="16.345">
        Nice, there are coordinates: <geopicker:dmsCoordinates latitude="51.127" longitude="16.345" />
    </geopicker:ifValid>