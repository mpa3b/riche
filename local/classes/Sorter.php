<?php

    namespace Local;

    /**
     * Класс должен сортировать товары по заданным критериям.
     *
     * Примерная логика работы: берём все товары, берём их закупочную и реализационную стоимость, время производства, берём заказы с ними.
     * Потом сортируем все товары по этим криетриям.
     *
     * Мы должны получить список товаров в порядке убывания общего отношения: чем товар выгоднее и быстрее производим -- тем он выше.
     *
     * Скорее всего, будем его дёргать по агенту, регулярно и/или при обновлении каталога.
     *
     */
    class Sorter
    {

    }