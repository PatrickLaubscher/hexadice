<?php


class Pagination 
{

    private int $totalPage;
    private int $pageNb;

    public function __construct(
        private int $itemPerPage,
        private array $itemsList,
    ) 
    {
        if (!isset($_GET['page'])) {
            $this->pageNb = 1;
        } else {
            $this->pageNb = $_GET['page'];
        }
    }


    /**
     * Return page number
     * 
     * @return int
     */
    public function getPageNb(): int
    {
        return $this->pageNb;
    }



    /**
     * Return an array of items for a specific$this->pageNb 
     *
     * @return array
     */
    public function getArrayPage (): array
    {
        $startingIdx = $this->itemPerPage * ($this->pageNb - 1);
        $arrayPage = array_slice($this->itemsList, $startingIdx, $this->itemPerPage);

        return $arrayPage;
    }


    /**
     * Return the total$this->pageNb number 
     *
     * @return int
     */
    public function getTotalPage (): int
    {
        $totalPage = ceil(count($this->itemsList) / $this->itemPerPage);

        return $this->totalPage = $totalPage;
    }


    /**
     * Return value of the next page
     *
     * @return int
     */
    public function nextPage (): int
    {
        return (($this->pageNb == $this->totalPage) ? $this->pageNb + 0 :  $this->pageNb + 1);
    }


    /**
     * Return value of the previous page
     *
     * @return int
     */
    public function prevPage (): int
    {
        return (($this->pageNb <= 1) ? $this->pageNb + 0 : $this->pageNb - 1);
    }


}