<?php

namespace WCS\MarmiwildBundle\DataFixtures\ORM;




use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use WCS\MarmiwildBundle\Entity\Recette;


class LoadRecetteData implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {

        //Liste des choses à ajouter

        $tab = array(
            array('nom'=>'Brownies',
                'type'=>'dessert',
                'imageFile' =>'brownies.jpg',
                'personne'=>6,
                'ingredient'=>'250 g de chocolat pâtissier, 1 sachet de sucre vanillé, 150 g de beurre, 3 oeufs, 60 g de farine, sel',
                'preparation'=>'Faites fondre le chocolat cassé en morceaux avec le beurre. Pendant ce temps, battez les oeufs avec le sucre jusqu\'à ce que le mélange blanchisse. Ajoutez la farine, le sucre vanillé, et ajoutez le chocolat. Versez le tout dans un moule, et enfournez à 180°C (thermostat 6)pendant 15 min... Et voilà !',
                'temps'=>'25'),
            array('nom' =>'Poulet Basquaise',
                'type'=>'Plat',
                'imageFile' =>'poulet_basquaise.jpg',
                'personne'=>4,
                'ingredient'=> '1 poulet coupé en 6 morceaux, 1 kg de tomate, 700 g de poivron (verts et rouges), 3 oignons émincés, 20 cl de vin blanc, 1 bouquet garni',
                'preparation'=>'Hacher l\'oignon et l\'ail. Couper les tomates en morceaux et détailler les poivrons en lanières. Faire chauffer 4 cuillères à soupe d\'huile dans une cocotte. Y faire dorer les oignons, l\'ail et les poivron. Laisser cuire 5 min. Ajouter les tomates à la cocotte, saler, poivrer. Couvrir et laisser mijoter 20 min. Dans une sauteuse, faire dorer dans l\'huile d\'olive les morceaux de poulet salés et poivrés. Lorsqu\'ils sont dorés, les ajouter aux légumes, couvrir, ajouter le bouquet garni et le vin blanc et c\'est parti pour 35 min de cuisson.',
                'temps'=>'80'),
            array('nom'=>'Oeufs d\'Oie en Salade',
                'type'=>'Entree',
                'imageFile' =>'salade.jpg',
                'personne'=>4,
                'ingredient'=>'2 oeufs d\'oies, 1 feuille de salade (feuille de chêne de préférence), 200 g de comté, 1 tranche de pain de campagne grillée par personne, des tomates cerise pour la déco, 1 vinaigrette',
                'preparation'=>'Mettre les oeufs d\'oie dans une casserole d\'eau froide et faire cuire à feu chaud pendant 12 à 15 mn. Egoutter et laisser tiédir. Dresser les assiettes avec un lit de salade,couper le fromage en petit dés et les répartir dans chaque assiette, frotter les tranches de pain avec l\'ail, les déposer sur la salade, écaller les oeufs et les couper en deux délicatement. Poser une moitié d\'oeuf par personne sur la tranche de pain, décorer avec les tomates cerises coupées en deux et parsemer de fines herbes hachées (ciboulette, cerfeuil, etc...). Arroser le tout avec la vinaigrette.',
                'temps'=>'25'),
            array('nom'=>'Crêpes au cidre',
                'type'=>'dessert',
                'imageFile' =>'crepes.jpg',
                'personne'=>4,
                'ingredient'=>'250 g de farine, 3  oeufs, 1 pincée de sel, 25 cl de lait, huile, 1 cuillère à soupe de sucre',
                'preparation'=>'Préparez la pâte à crêpes. Mélangez la farine, le sucre et le sel, y faire un puits, ajouter les oeufs l\'un après l\'autre en mélangeant à chaque fois. Versez petit à petit le lait, puis l\'huile et le cidre en dernier. Laissez reposer au moins 1 heure. Pendant ce temps, lavez, épluchez et coupez les pommes en fines lamelles. Mettez-les dans un bol avec la crème de calvados. La crème ne doit pas obligatoirement recouvrir toutes les pommes, mais elles doivent en être imprégnées. Laissez mariner au moins 30 min. Faites vos crêpes et conservez-les au chaud dans un papier d\'aluminium ou dans le four chaud. Faites fondre la noix de beurre dans une poêle et y laisser revenir les pommes un instant. Vous pouvez garnir quelques crêpes avant de servir ou disposer le tout sur la table avec d\'autres garnitures (miel, confitures, sucre à la cannelle...).',
                'temps'=>'10'),
        );

        foreach ($tab as $row) {
            $newRecette = new Recette();
            $newRecette
                ->setNom($row['nom'])
                ->setType($row['type'])
                ->setImage($row['imageFile'])
                ->setPersonne($row['personne'])
                ->setIngredient($row['ingredient'])
                ->setPreparation($row['preparation'])
                ->setTemps($row['temps']);

            $manager->persist($newRecette);
        }
        $manager->flush();

    }
}