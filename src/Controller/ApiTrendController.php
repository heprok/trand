<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\AttributeRepository;
use App\Repository\TrendRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Tlc\ReportBundle\Entity\BaseEntity;

#[Route(path: "api/trends", name: "trend_")]
class ApiTrendController extends AbstractController
{
    public function __construct(
        private TrendRepository $trendRepository,
        private AttributeRepository $attributeRepository
    ) {
    }

    #[Route(path: "/chartAttributes", name: "chart_attributes")]
    public function getChartAttributes(Request $request)
    {
        $dates = $request->query->get('drec');
        $attributes = (array)$request->query->get('attribute');
        $period = BaseEntity::getPeriodFrom2DateString($dates['after'], $dates['before']);
        
        $trends = $this->trendRepository->findByAttribute($period, $attributes);

        $attributes = $this->attributeRepository->findBy(['id' => $attributes]);
        $datasets = [];
        foreach ($attributes as $attribute) {
            $attributeId = $attribute->getId();
            $datasets[$attribute->getId()] = [
                "name" => $attribute->getName(),
                "data" => [],
            ];
            // if ( !($valuesBuff[$attributeId] = $this->trendRepository->findOneByAttributeFirstValue($period, $attributeId)) )

            $lastValueBuff[$attributeId] =
                $this->trendRepository->findOneByAttributeFirstValue($period, $attributeId) ?
                $this->trendRepository->findOneByAttributeFirstValue($period, $attributeId)->getValue() :
                $this->trendRepository->findOneByAttributeLastValue($period, $attributeId)->getValue();
        };

        if ($trends) {
            foreach ($trends as $trend) {
                $trendAttributeId = $trend->getAttribute()->getId();

                $datasets[$trendAttributeId]['data'][] = [
                    'x' => $trend->getDrecFormat(DATE_ATOM),
                    'y' => $lastValueBuff[$trendAttributeId] = $trend->getValue()
                ];

                foreach ($attributes as $attribute) {
                    $attributeId = $attribute->getId();
                    if ($attributeId == $trendAttributeId) continue;

                    $datasets[$attributeId]['data'][] = [
                        'x' => $trend->getDrecFormat(DATE_ATOM),
                        'y' => $lastValueBuff[$attributeId]
                    ];
                }
            }
        } else {
            foreach ($attributes as $attribute) {
                $attributeId = $attribute->getId();

                $datasets[$attributeId]['data'][] = [
                    'x' => $period->getEndDate()->format(DATE_ATOM),
                    'y' => $lastValueBuff[$attributeId]
                ];
            }
        }
        return $this->json($datasets);
        // dd($request->query->get('drec'));
    }
}
