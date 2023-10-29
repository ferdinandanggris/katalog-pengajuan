<?php

namespace App\Constants;

class StockTypeConstant
{
  const TYPE_CHEMICAL = '(C) Chemical';
  const TYPE_FUEL_AND_OIL = '(F) Fuel & Oil';
  const TYPE_MACHINE = "(M) Suku cadang Mesin";
  const TYPE_ELECTRIC = "(E) Suku cadang Listrik";
  const TYPE_INSTRUMENT = "(I) Suku cadang Instrument/Control";
  const TYPE_GENERAL = "(G) General/Consumables";


  public static function list()
  {
    return [
      self::TYPE_CHEMICAL => self::TYPE_CHEMICAL,
      self::TYPE_FUEL_AND_OIL => self::TYPE_FUEL_AND_OIL,
      self::TYPE_MACHINE => self::TYPE_MACHINE,
      self::TYPE_ELECTRIC => self::TYPE_ELECTRIC,
      self::TYPE_INSTRUMENT => self::TYPE_INSTRUMENT,
      self::TYPE_GENERAL => self::TYPE_GENERAL,
    ];
  }
}
