<?php

namespace App\Factory;

use App\Entity\Car;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Car>
 */
final class CarFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Car::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'daily_price' => self::faker()->randomFloat(2,30,120),
            'description' => self::faker()->text(200),
            'manual_gearbox' => self::faker()->boolean(),
            'monthly_price' => self::faker()->randomFloat(2, 400,1500),
            'name' => self::faker()->randomElement([
                'Renault Clio',
                'Peugeot 208',
                'Volkswagen Golf',
                'Toyota Yaris',
                'Ford Fiesta',
                'Citroën C3',
                'Opel Corsa',
                'Fiat 500',
                'Dacia Sandero',
                'Seat Ibiza'
            ]),
            'number_of_places' => self::faker()->randomElement([2, 4]),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Car $car): void {})
        ;
    }
}
