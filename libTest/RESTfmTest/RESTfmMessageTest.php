<?php

//require_once 'PHPUnit/Autoload.php';

//use phpunit\framework\TestCase;

class RESTfmMessageTest extends \PHPUnit_Framework_TestCase
{
    static $importData = array(
        'meta'  => array(
            0   => array(
                'recordID'  =>  '001',
                'href'      =>  'href1',
            ),
            1   => array(
                'recordID'  =>  '002',
                'href'      =>  'href2',
            ),
        ),
        'data'  => array(
            0   => array(
                'field1'    => 'value1',
                'field2'    => 'value2',
            ),
            1   => array(
                'field1'    => 'value3',
                'field2'    => 'value4',
            ),
        ),
        'info'  => array(
            'infoField1'    => 'infoValue1',
            'infoField2'    => 'infoValue2',
        ),
        'nav'   => array(
            0   => array(
                'navField1' => 'navValue1',
                'navField2' => 'navValue2',
            ),
            1   => array(
                'navField1' => 'navValue3',
                'navField2' => 'navValue4',
            ),
        ),
        'metaField' => array(
            0   => array(
                'metaFieldField1'   => 'metaFieldValue1',
                'metaFieldField2'   => 'metaFieldValue2',
            ),
            1   => array(
                'metaFieldField1'   => 'metaFieldValue3',
                'metaFieldField2'   => 'metaFieldValue4',
            ),
        ),
        'multistatus'   => array(
            0   => array(
                'index'     =>  1,
                'recordID'  =>  '002',
                'Status'    =>  '101',
                'Reason'    =>  'reason string 1',
            ),
            1   => array(
                'index'     =>  0,
                'recordID'  =>  '001',
                'Status'    =>  '102',
                'Reason'    =>  'reason string 2',
            ),
        )
    );

    public function testImportAndExport() {
        $message = new RESTfmMessage();

        $message->importArray(RESTfmMessageTest::$importData);

        $export = $message->exportArray();

        // record 0
        $this->assertEquals(
                RESTfmMessageTest::$importData['meta'][0]['recordID'],
                $export['meta'][0]['recordID']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['meta'][0]['href'],
                $export['meta'][0]['href']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['data'][0]['field1'],
                $export['data'][0]['field1']
        );

        // record 1
        $this->assertEquals(
                RESTfmMessageTest::$importData['meta'][1]['recordID'],
                $export['meta'][1]['recordID']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['meta'][1]['recordID'],
                $export['meta'][1]['recordID']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['data'][1]['field1'],
                $export['data'][1]['field1']
        );

        // info
        $this->assertEquals(
                RESTfmMessageTest::$importData['info']['infoField1'],
                $export['info']['infoField1']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['info']['infoField2'],
                $export['info']['infoField2']
        );

        // nav 0
        $this->assertEquals(
                RESTfmMessageTest::$importData['nav'][0]['navField1'],
                $export['nav'][0]['navField1']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['nav'][0]['navField2'],
                $export['nav'][0]['navField2']
        );

        // nav 1
        $this->assertEquals(
                RESTfmMessageTest::$importData['nav'][1]['navField1'],
                $export['nav'][1]['navField1']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['nav'][1]['navField2'],
                $export['nav'][1]['navField2']
        );

        // metaField 0
        $this->assertEquals(
                RESTfmMessageTest::$importData['metaField'][0]['metaFieldField1'],
                $export['metaField'][0]['metaFieldField1']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['metaField'][0]['metaFieldField2'],
                $export['metaField'][0]['metaFieldField2']
        );

        // metaField 1
        $this->assertEquals(
                RESTfmMessageTest::$importData['metaField'][1]['metaFieldField1'],
                $export['metaField'][1]['metaFieldField1']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['metaField'][1]['metaFieldField2'],
                $export['metaField'][1]['metaFieldField2']
        );

        // multistatus 0
        $this->assertEquals(
                RESTfmMessageTest::$importData['multistatus'][0]['index'],
                $export['multistatus'][0]['index']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['multistatus'][0]['recordID'],
                $export['multistatus'][0]['recordID']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['multistatus'][0]['Status'],
                $export['multistatus'][0]['Status']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['multistatus'][0]['Reason'],
                $export['multistatus'][0]['Reason']
        );

        // multistatus 1
        $this->assertEquals(
                RESTfmMessageTest::$importData['multistatus'][1]['index'],
                $export['multistatus'][1]['index']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['multistatus'][1]['recordID'],
                $export['multistatus'][1]['recordID']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['multistatus'][1]['Status'],
                $export['multistatus'][1]['Status']
        );
        $this->assertEquals(
                RESTfmMessageTest::$importData['multistatus'][1]['Reason'],
                $export['multistatus'][1]['Reason']
        );

        //var_dump($message);
        //var_dump($export);

    }

}
