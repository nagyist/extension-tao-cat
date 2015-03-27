<?php
/**  
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; under version 2
 * of the License (non-upgradable).
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * 
 * Copyright (c) 2015 (original work) Open Assessment Technologies SA (under the project TAO-PRODUCT);
 * 
 */

$extpath = dirname(__FILE__).DIRECTORY_SEPARATOR;
$taopath = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'tao'.DIRECTORY_SEPARATOR;

return array(
	'name' => 'taoCat',
    'label' => 'TAO Computer Adaptive Testing (CAT)',
	'description' => 'The TAO Computer Adaptive Testing engine API.',
    'license' => 'GPL-2.0',
    'version' => '1.0.0',
	'author' => 'Open Assessment Technologies',
	'requires' => array(
	    'taoTests' => '>=2.6',
	),
	'install' => array(
		'rdf' => array(
		    dirname(__FILE__).DIRECTORY_SEPARATOR . 'install' . DIRECTORY_SEPARATOR . 'ontology' . DIRECTORY_SEPARATOR . 'testModel.rdf'
		),
		'checks' => array(
		),
	),
    'autoload' => array (
        'psr-4' => array(
            'oat\\taoCat\\' => dirname(__FILE__).DIRECTORY_SEPARATOR
        ),
    ),
    'routes' => array(
        '/taoCat' => 'oat\\taoCat\\controller'
    ),
	'managementRole' => 'http://www.tao.lu/Ontologies/TAOTest.rdf#CATtestManager',
    'acl' => array(
        array('grant', 'http://www.tao.lu/Ontologies/TAOTest.rdf#CATtestManager', array('ext'=>'taoCat')),
        array('grant', 'http://www.tao.lu/Ontologies/TAO.rdf#DeliveryRole', array('ext'=>'taoCat', 'mod' => 'TestRunner')),
        array('grant', 'http://www.tao.lu/Ontologies/TAOTest.rdf#TestsManagerRole', array('ext'=>'taoCat', 'mod' => 'Authoring'))
    ),    
	'constants' => array(
	    'DIR_VIEWS' => $extpath . 'views' . DIRECTORY_SEPARATOR,
	    'BASE_URL' => ROOT_URL	. 'taoCat/',
	    'BASE_WWW' => ROOT_URL	. 'taoCat/views/',
	)
);
