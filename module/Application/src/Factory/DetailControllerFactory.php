<?php
namespace Application\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Controller\DetailController;

class DetailControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $em = $container->get(EntityManager::class);

        return new DetailController($em);
    }
}
