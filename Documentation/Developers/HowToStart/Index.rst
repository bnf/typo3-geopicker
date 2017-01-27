How to start?
-------------

The very first thing you need to do during development new extension is adding the dependency into your :samp:`ext_emconf.php` file. Thanks to this, users who'll install your ext from TER via EM won't need to install the GeoPicker manually.

sample entry can look like this:

.. code-block:: php

    $EM_CONF[$_EXTKEY] = array(
        ...,
        'constraints' => array(
            'depends' => array(
                'typo3' => '6.2',
                'geopicker' => '1.0.0', // of course version number should be confirmed by you
            ),
            ...,
        ),
    );

Of course it would be best if you tested newest GeoPicker version and update the dependency, each time when you are gonna to publish new version of your extension.