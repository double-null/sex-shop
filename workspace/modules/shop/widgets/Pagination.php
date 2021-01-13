<?php

namespace workspace\modules\shop\widgets;

use core\Widget;

class Pagination extends Widget
{
    protected $totalPage = 1;
    protected $totalItems;
    protected $currentPage = 1;
    protected $pageUrl;
    protected $wrapperTemplate;
    protected $buttonTemplate;
    protected $currentPageTemplate;
    protected $separateTemplate;

    /**
     * Установка параметров
     *
     * @param $currentPage - номер текущей страницы
     * @param $totalItems - количество страниц в пагинации
     * @param $pageUrl - адрес ссылки с параметром page
     * @param $pageSize - количество элементов на странице
     * @return $this
     */
    public function setParams($currentPage, $totalItems, $pageUrl, $pageSize = 15)
    {
        $this->currentPage = $currentPage;
        $this->totalItems = $totalItems;
        $this->totalPage = ceil($totalItems/$pageSize);
        $this->pageUrl = $pageUrl;
        $this->pageSize = $pageSize;
        return $this;
    }

    public function defaultWrapperTpl()
    {
        return '<nav class="block-27"><ul>{buttons}</ul></nav>';
    }

    public function defaultButtonTpl()
    {
        return '<li><a href="{url}{page}">{display_page}</a></li>';
    }

    public function defaultCurrentPageTpl()
    {
        return '<li class="active"><span>{page}</span></li>';
    }

    public function defaultSeparateTpl()
    {
        return '<span>..</span>';
    }

    public function run()
    {
        $btnTpl = ($this->buttonTemplate) ?? $this->defaultButtonTpl();
        $wrapTpl = ($this->wrapperTemplate) ?? $this->defaultWrapperTpl();
        $cpTpl = ($this->currentPageTemplate) ?? $this->defaultCurrentPageTpl();
        $separateTpl = ($this->separateTemplate) ?? $this->defaultSeparateTpl();
        $buttons = '';

        if ($this->totalPage > 5 && $this->currentPage > 1) {
            $buttons .= str_replace(
                ['{url}','{page}', '{display_page}'],
                [$this->pageUrl, $this->currentPage-1, '<'],
                $btnTpl
            );
        }

        for ($page = 1; $page <= $this->totalPage; $page++) {

            if ($this->totalPage >= 8) {
                if ($page == 3 || $page == $this->totalPage-1) {
                    $buttons .= $separateTpl;
                }

                if (
                    $page <= 2 ||
                    $page > $this->totalPage - 2 ||
                    ($page > $this->currentPage-2 && $page < $this->currentPage+2)
                ) {
                    if ($page == $this->currentPage) {
                        $buttons .= str_replace('{page}', $page, $cpTpl);
                    } else {
                        $buttons .= str_replace(
                            ['{url}', '{page}', '{display_page}'],
                            [$this->pageUrl, $page, $page],
                            $btnTpl
                        );
                    }
                }
            } else {
                if ($page == $this->currentPage) {
                    $buttons .= str_replace('{page}', $page, $cpTpl);
                } else {
                    $buttons .= str_replace(
                        ['{url}', '{page}', '{display_page}'],
                        [$this->pageUrl, $page, $page],
                        $btnTpl
                    );
                }
            }
        }

        if ($this->totalPage > 5) {
            $buttons .= str_replace(
                ['{url}','{page}', '{display_page}'],
                [$this->pageUrl, $this->currentPage+1, '>'],
                $btnTpl
            );
        }
        echo str_replace('{buttons}', $buttons, $wrapTpl);
    }
}
