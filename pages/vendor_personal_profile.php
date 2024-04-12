<?php
  session_start();
  require($_SERVER["DOCUMENT_ROOT"] . "/sources/blocks/header.php");
  require_once($_SERVER["DOCUMENT_ROOT"] . "/server/db_model.php");

  if (empty($_SESSION))
  	header('Location: /index.php');

  $user = $_SESSION['user'];

  if (array_key_exists('client_id', $user))
	header('Location: user_personal_profile.php');
?>

<div id="profile_company">
	<div class="container_name_company">
		<div class="cadr_name_company">
			<div class="name_company">
				<div class="text_name">
					<?= $user['company_name'] ?>
				</div>
				<div class="icon">
					<!-- открывать форму изменения имени компании -->
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 15.8328V20H4.16725L16.4634 7.70385L12.2962 3.5366L0 15.8328ZM19.675 4.49229C20.1083 4.0589 20.1083 3.35324 19.675 2.91985L17.0802 0.325045C16.6468 -0.108348 15.9411 -0.108348 15.5077 0.325045L13.4741 2.35866L17.6413 6.52591L19.675 4.49229Z" fill="#333333"/>
					</svg>
				</div>
			</div>
		</div>
	</div>

	<div class="container_dop_company">
		<div class="cadrs_dop_company">
			<div class="photo_company" style="background: url(<?= (!empty($_SESSION['user']['photo_path'])) ? "/data/users/{$_SESSION['user']['id']}/{$_SESSION['user']['photo_path']}" : "/sources/images/avatar_no_img.png" ?>) no-repeat center/cover;"></div>
			<!-- кнопки изменений -->
			<button class="submit downolang_photo_company" type="submit">
				<div class="icon">
					<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M2.34783 2.28571V0H3.91304V2.28571H6.26087V3.80952H3.91304V6.09524H2.34783V3.80952H0V2.28571H2.34783ZM4.69565 6.85714V4.57143H7.04348V2.28571H12.5217L13.9539 3.80952H16.4348C17.2957 3.80952 18 4.49524 18 5.33333V14.4762C18 15.3143 17.2957 16 16.4348 16H3.91304C3.05217 16 2.34783 15.3143 2.34783 14.4762V6.85714H4.69565ZM10.1739 13.7143C12.3339 13.7143 14.087 12.0076 14.087 9.90476C14.087 7.8019 12.3339 6.09524 10.1739 6.09524C8.01391 6.09524 6.26087 7.8019 6.26087 9.90476C6.26087 12.0076 8.01391 13.7143 10.1739 13.7143ZM7.66957 9.90476C7.66957 11.2533 8.7887 12.3429 10.1739 12.3429C11.5591 12.3429 12.6783 11.2533 12.6783 9.90476C12.6783 8.55619 11.5591 7.46667 10.1739 7.46667C8.7887 7.46667 7.66957 8.55619 7.66957 9.90476Z" fill="white"/>
					</svg>
				</div>
				<div class="text">
					Загрузить фото
				</div>
			</button>
			<button class="submit add_point" type="submit">
				<div class="icon">
					<svg width="17" height="15" viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M25.5 0H1.5V3H25.5V0ZM27 15V12L25.5 4.5H1.5L0 12V15H1.5V24H16.5V15H22.5V24H25.5V15H27ZM13.5 21H4.5V15H13.5V21Z" fill="white"/>
					</svg>
				</div>
				<div class="text">
					Добавить помещение
				</div>
			</button>
			<button class="submit add_product" type="submit">
				<div class="icon">
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14.2222 0H1.77778C0.795556 0 0.00888888 0.795556 0.00888888 1.77778L0 14.2222C0 15.2044 0.795556 16 1.77778 16H14.2222C15.2044 16 16 15.2044 16 14.2222V1.77778C16 0.795556 15.2044 0 14.2222 0ZM13.3333 9.77778H9.77778V13.3333H6.22222V9.77778H2.66667V6.22222H6.22222V2.66667H9.77778V6.22222H13.3333V9.77778Z" fill="white"/>
					</svg>
				</div>
				<div class="text">
					Добавить товар
				</div>
			</button>
		</div>
	</div>
	<div class="container_product_sort">
		<div class="container_sort">
			<div class="text_product">
				Мои товары
			</div>
			<div class="sort">
				<form id="filter_two" action="/server/server.php" method="POST">
					<div class="left">
						<select id="rating_input" name="rating">
							<option value="0">По рейтингу</option>
							<option value="1">По возрастанию цены</option>
							<option value="2">По убыванию цены</option>
							<option value="3">Больше отзывов</option>
						</select>
						<div>
							<input id="start_cost" type="number" min="0" placeholder="От ₽" name="start_cost">
							<div class="line"></div>
							<input id="back_cost" type="number" min="0" placeholder="До ₽" name="back_cost">
						</div>
						<select id="category_input" name="category">
							<option value="0" hidden>Категория</option>
							<option value="1">2</option>
							<option value="2">3</option>
						</select>
					</div>
					<div class="right">
						<button class="submit" type="submit">Сортировать</button>
					</div>
				</form>
			</div>
		</div>
		<div class="line"></div>
	</div>
	<!-- карты -->
	<div id="cards_vendors">
		<div class="inner">
			<?
			$db = new MysqlModel();
			$products = $db->goResult("
				SELECT
					*
				FROM
					PRODUCTS
				WHERE
					vendor_id = $user[vendor_id]
			");

			$product_photos = $db->goResult("
				SELECT
				*
				FROM
				PRODUCT_PHOTOS
			");

			$product_rates = $db->goResult("
				SELECT
				product_id,
				rate
				FROM
				REVIEWS
			");

			for ($i = 0; $i < count($products); $i++)
			{
				$avg_rate = 0;
				$review_count = 0;

				for ($j = 0; $j < count($product_photos); $j++)
				{
					if ($product_photos[$j]['product_id'] == $products[$i]['id'])
					{
						$products[$i]['photos'][] = $product_photos[$j]['photo_path'];
					}
				}

				for ($j = 0; $j < count($product_rates); $j++)
				{
					if ($product_rates[$j]['product_id'] == $products[$i]['id'])
					{
						$avg_rate += $product_rates[$j]['rate'];
						$review_count++;
					}
				}

				if ($review_count > 0)
				$avg_rate /= $review_count;

				$products[$i]['rate'] = $avg_rate;
			}

			foreach ($products as $product):
			?>
				<!-- Начало карточки -->
				<div class="card" card_id="<?= $product['id'] ?>">
					<div class="trash">
						<svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1.14286 18.6667C1.14286 19.9558 2.16571 21 3.42857 21H12.5714C13.8343 21 14.8571 19.9558 14.8571 18.6667V4.66667H1.14286V18.6667ZM16 1.16667H12L10.8571 0H5.14286L4 1.16667H0V3.5H16V1.16667Z" fill="white"/>
						</svg>
					</div>
					<a class="block" href="#">
						<div class="image" style="background: url(<?= (array_key_exists("photos", $product)) ? "/data/products/{$product['id']}/{$product['photos'][0]}" : "/sources/images/photo.png" ?>) no-repeat center/cover;"></div>
						<p class="description">
							<?= $product['name'] ?>
						</p>
					</a>
					<div class="double">
						<div class="price">
							<div class="icon">
								<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M0.4425 7.185L7.18875 0.43875C7.45875 0.16875 7.83375 0 8.25 0H13.5C14.3288 0 15 0.67125 15 1.5V6.75C15 7.16625 14.8313 7.54125 14.5575 7.81125L7.8075 14.5613C7.5375 14.8313 7.1625 15 6.75 15C6.33375 15 5.95875 14.8313 5.68875 14.5613L0.438749 9.31125C0.168749 9.0375 0 8.6625 0 8.25C0 7.83375 0.16875 7.45875 0.4425 7.185ZM12.375 3.75C12.9975 3.75 13.5 3.2475 13.5 2.625C13.5 2.0025 12.9975 1.5 12.375 1.5C11.7525 1.5 11.25 2.0025 11.25 2.625C11.25 3.2475 11.7525 3.75 12.375 3.75ZM3.5475 9.9525L6.75 13.155L9.9525 9.9525C10.29 9.61125 10.5 9.1425 10.5 8.625C10.5 7.59 9.66 6.75 8.625 6.75C8.1075 6.75 7.635 6.96 7.2975 7.30125L6.75 7.84875L6.2025 7.30125C5.86125 6.96 5.3925 6.75 4.875 6.75C3.84 6.75 3 7.59 3 8.625C3 9.1425 3.21 9.61125 3.5475 9.9525Z" fill="#669EF2"/>
								</svg>
							</div>
							<div class="text"><?= round($product['price']) ?> ₽</div>
						</div>
						<div class="rating">
							<div><?= (float) $product['rate'] ?></div>
							<div class="icon">
								<? for ($i = 0; $i < 5; $i++): ?>
									<? if ($i < round($product['rate'])):?>
										<svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M6.40098 11.3656C6.71825 11.1747 7.11508 11.1747 7.43235 11.3656L9.7804 12.7789C10.538 13.2349 11.4712 12.5554 11.2698 11.6943L10.6486 9.03904C10.5639 8.6769 10.6872 8.29766 10.9686 8.05453L13.0358 6.26869C13.7058 5.6899 13.3486 4.59017 12.4664 4.51553L9.74161 4.285C9.3723 4.25376 9.05055 4.02081 8.90558 3.67971L7.83699 1.16544C7.49197 0.353631 6.34136 0.353631 5.99634 1.16544L4.92775 3.67971C4.78278 4.02081 4.46104 4.25376 4.09173 4.285L1.36698 4.51553C0.48477 4.59017 0.127576 5.6899 0.797552 6.2687L2.86473 8.05453C3.14616 8.29766 3.26942 8.6769 3.1847 9.03904L2.56354 11.6943C2.36211 12.5554 3.29531 13.2349 4.05293 12.7789L6.40098 11.3656Z" fill="#669EF2"/>
										</svg>
									<? else: ?>
										<svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M6.40098 11.3656C6.71825 11.1747 7.11508 11.1747 7.43235 11.3656L9.7804 12.7789C10.538 13.2349 11.4712 12.5554 11.2698 11.6943L10.6486 9.03904C10.5639 8.6769 10.6872 8.29766 10.9686 8.05453L13.0358 6.26869C13.7058 5.6899 13.3486 4.59017 12.4664 4.51553L9.74161 4.285C9.3723 4.25376 9.05055 4.02081 8.90558 3.67971L7.83699 1.16544C7.49197 0.353631 6.34136 0.353631 5.99634 1.16544L4.92775 3.67971C4.78278 4.02081 4.46104 4.25376 4.09173 4.285L1.36698 4.51553C0.48477 4.59017 0.127576 5.6899 0.797552 6.2687L2.86473 8.05453C3.14616 8.29766 3.26942 8.6769 3.1847 9.03904L2.56354 11.6943C2.36211 12.5554 3.29531 13.2349 4.05293 12.7789L6.40098 11.3656Z" fill="#A5A5A5"/>
										</svg>
									<? endif ?>
								<? endfor ?>
							</div>
						</div>
					</div>
					<a class="button_link">
						<div class="icon">
							<svg width="13" height="13" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0 15.8328V20H4.16725L16.4634 7.70385L12.2962 3.5366L0 15.8328ZM19.675 4.49229C20.1083 4.0589 20.1083 3.35324 19.675 2.91985L17.0802 0.325045C16.6468 -0.108348 15.9411 -0.108348 15.5077 0.325045L13.4741 2.35866L17.6413 6.52591L19.675 4.49229Z" fill="white"/>
							</svg>
						</div>
						<div>Изменить</div>
					</a>
				</div>
				<!-- Конец карточки -->
			<? endforeach ?>
		</div>
	</div>
</div>

<?
  require($_SERVER["DOCUMENT_ROOT"] . "/sources/blocks/footer.php");
?>
