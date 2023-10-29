<?php

namespace App\Constants;

class CategoryConstant
{
  const CATEGORY_COMMON = 'UMUM';
  const CATEGORY_CONTROL = 'KONTROL';
  const CATEGORY_ELECTRIC = 'LISTRIK';
  const CATEGORY_CHEMICAL = 'KIMIA';
  const CATEGORY_MACHINE = 'MESIN';

  const TYPE_TEXT = 'text';
  const TYPE_NUMBER = 'number';

  const INPUT_OPTIONAL = 'optional';
  const INPUT_REQUIRED = 'required';

  public static function list()
  {
    return [
      self::CATEGORY_COMMON   => self::CATEGORY_COMMON,
      self::CATEGORY_CONTROL  => self::CATEGORY_CONTROL,
      self::CATEGORY_CHEMICAL => self::CATEGORY_CHEMICAL,
      self::CATEGORY_MACHINE  => self::CATEGORY_MACHINE,
      self::CATEGORY_ELECTRIC => self::CATEGORY_ELECTRIC,
    ];
  }

  static function input($inputName, $defaultValue = '', $inputType = null, $inputRequired = null)
  {

    if (!$inputType) {
      $inputType = self::TYPE_TEXT;
    }

    if (!$inputRequired) {
      $inputRequired = self::INPUT_REQUIRED;
    }

    return [
      'name' => $inputName,
      'type' => $inputType,
      'sample' => $defaultValue,
      'required' => $inputRequired
    ];
  }


  public static function items()
  {
    return [
      self::CATEGORY_COMMON   => [
        'ABRASIVE 1' => [
          self::input('item Name', 'Abrasive'),
          self::input('Jenis', 'Belts, cloth, paper'),
          self::input('Number', '1 / 2 / 100 /…', self::TYPE_NUMBER),
          self::input('Material', 'Silicon carbide'),
        ],
        'ABRASIVE 2' => [
          self::input('item Name', 'Abrasive'),
          self::input('Jenis', 'Stone kasar-halus, Stone halus'),
          self::input('Size', '170MM x 70MM x 50MM'),
        ],
        'ACCESSORIES OIL TREATMENT PLANT' => [],
        'ADHESIVE' => [
          self::input('item Name', 'ADHESIVE'),
          self::input('Jenis', 'glue, epoxy, lem besi, lem kayu, lem kertas'),
          self::input('Size', '__ kgs, __ litre, __ gallons, __ ml (per UOI)'),
        ],
      ],
      self::CATEGORY_CONTROL  => [
        'ALARM = SPEAKER = HORN' => [
          self::input('item Name', 'Alarm'),
          self::input('Voltage', '12-24 VDC'),
          self::input('Current', '15 mA'),
          self::input('Sound', '95 dB/M'),
        ],
      ],
      self::CATEGORY_CHEMICAL => [
        'ALCOHOL' => [
          self::input('item Name', 'ALCOHOL'),
          self::input('Nama Kimia', 'CnH2n+1OH'),
        ],
      ],
      self::CATEGORY_MACHINE  => [
        'ACCUMULATOR / BLADDER / PRESSURE TANK' => [
          self::input('Item name', 'ALCOHOL'),
          self::input('Size/Dimensi', 'Bila ada', null, self::INPUT_OPTIONAL),
          self::input('Material', 'Bila ada', null, self::INPUT_OPTIONAL),
        ],
      ],
      self::CATEGORY_ELECTRIC => [
        'ADAPTOR' => [
          self::input('Item name', 'Adaptor'),
          self::input('Current', '25 A'),
          self::input('Input (AC)', '115/230 V'),
          self::input('Output (DC)', '14.5 V'),
          self::input('Type', '1 phase / 3 phase'),
        ]
      ],
    ];
  }
}
