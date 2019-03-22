<?php declare(strict_types=1);

namespace FatCode\Tests\Storage;

use FatCode\Storage\Hydration\NamingStrategy\NamingStrategy;
use FatCode\Storage\Hydration\Type\IntegerType;
use FatCode\Storage\Hydration\Type\StringType;
use FatCode\Storage\Hydration\Type\Type;
use FatCode\Tests\Storage\Fixtures\UserSchema;
use PHPUnit\Framework\TestCase;

final class SchemaTest extends TestCase
{
    public function testGetProperties() : void
    {
        $schema = new UserSchema();
        $properties = $schema->getProperties();

        self::assertCount(7, $schema);
        self::assertInstanceOf(StringType::class, $properties['language']);
        self::assertInstanceOf(StringType::class, $properties['email']);
        self::assertInstanceOf(IntegerType::class, $properties['age']);
        self::assertInstanceOf(StringType::class, $properties['eyeColor']);
    }

    public function testIterateThroughSchema() : void
    {
        $schema = new UserSchema();

        foreach ($schema as $name => $property) {
            self::assertInstanceOf(Type::class, $property);
        }
    }

    public function testGetNamingStrategy() : void
    {
        $schema = new UserSchema();

        self::assertInstanceOf(NamingStrategy::class, $schema->getNamingStrategy());
    }
}
