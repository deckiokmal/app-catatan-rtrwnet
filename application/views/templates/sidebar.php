<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar" class="nav-sidebar">
        <ul class="list-unstyled components" id="accordion">
            <div class="user-profile">
                <div class="dropdown user-pro-body">
                    <div><img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-responsive img-circle"></div>
                    <div class="mb-2"><a href="#" class="" data-toggle="" aria-haspopup="true" aria-expanded="false"> <span class="font-weight-semibold"><?= $user['name']; ?></span> </a>
                        <br><span class="text-gray"><?= $user['email']; ?></span>
                    </div>
                </div>
            </div>

            <?php
            $role_id = $this->session->userdata('role_id');
            $queryAkses =  "  SELECT `user`.`role_id`, `user_role`.`role`
										FROM `user` JOIN `user_role`
										ON `user`.`role_id` = `user_role`.`role`
									WHERE `user`.`role_id` = $role_id									
									";
            $akses = $this->db->query($queryAkses)->row();
            $uri = $this->uri->segment(1);
            ?>

            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu =  "  SELECT `user_menu`.`id`, `menu`, `icon_menu`, `url_menu`
										FROM `user_menu` JOIN `user_access_menu`
										ON `user_menu`.`id` = `user_access_menu`.`menu_id`
									WHERE `user_access_menu`.`role_id` = $role_id
									ORDER BY `user_access_menu`.`menu_id` ASC
									";
            $menu = $this->db->query($queryMenu)->result_array();
            $uri = $this->uri->segment(1);
            ?>

            <?php foreach ($menu as $m) : ?>
                <?php $uri = $this->uri->segment(1); ?>
                <?php $uri2 = $this->uri->segment(2); ?>



                <li class="">

                    <a href="#<?= $m['url_menu']; ?>" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
                        <i class="<?= $m['icon_menu']; ?>"></i> <?= $m['menu']; ?>
                    </a>
                    <ul class="collapse list-unstyled" id="<?= $m['url_menu']; ?>" data-parent="#accordion">

                        <?php
                        $menuId = $m['id'];
                        $querySubMenu = "
                        SELECT *
                          FROM `user_sub_menu` JOIN `user_menu`
                            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                         WHERE `user_sub_menu`.`menu_id` = $menuId
                           AND `user_sub_menu`.`is_active` = 1
                    ";
                        $subMenu = $this->db->query($querySubMenu)->result_array();
                        ?>

                        <?php foreach ($subMenu as $sm) : ?>




                            <li><a href="<?= base_url($sm['url']); ?>"><?= $sm['title']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>

                </li>
            <?php endforeach; ?>
        </ul>

    </nav>