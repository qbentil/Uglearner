<?php

    class vPortfolios{
        private $portfolios;
        function __construct()
        {
            require_once "./core/portfolio.php";
            require_once "./core/communities.php";
            $this->portfolios = new Portfolio("../");
        }


        public function fetch_portfolios($fetch_rule = NULL)
        {
            $portfolios = $this->portfolios->records($fetch_rule);
            if($portfolios !="NO_DATA")
            {
                // return $portfolios;
                foreach ($portfolios as $portfolio) {
                    echo "
                    <tr>
                        <td class = 'text-uppercase'>{$portfolio['name']}</td>
                        <td>
                            <a href='javascript:;' class='btn btn-sm edit_portfolio_info_btn' data-id='{$portfolio['id']}' ><i class='ti-pencil-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm del_portfolio_info_btn' data-id='{$portfolio['id']}'><i class='ti-trash'></i></a>
                        </td>
                    </tr>
                    ";
                }
            }
        }


        public function portfolio_data($id)
        {
            return $this->portfolios->singlerecord($id);
        }

        public function community($cid)
        {
            return $this->portfolios->community($cid);
        }
        public function community_list($cid)
        {
            $dep = $this->community($cid);
            echo "<option value='{$dep['id']}' selected>{$dep['name']}</option>";
            $depts = new Community();
            $fetch_rule = "WHERE `id` <> $cid";
            $depts = $depts->records($fetch_rule);
            if($depts != "NO_DATA")
            {
                foreach ($depts as $dep) {
                    echo " <option value='{$dep['id']}'>{$dep['name']}</option>";
                }
            }
        }
        // public function admin_data($id)
        // {
        //     return $this->courses->singlerecord($id);
        // }
        // public function role($rid)
        // {
        //     return $this->courses->admin_role($rid);
        // }

    }

?>