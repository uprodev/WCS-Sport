<?php get_header(); ?>

<section class="page-header-career bg-primary">
	<div class="container-fluid">
		<div class="row align-items-center justify-content-between">
			<div class="col-md-6 col-xl-5">
				<h2><?php the_title() ?></h2>
			</div>
			<div class="col-md-6 col-xl-5 col-xxl-6">

				<?php if ($field = get_field('description')): ?>

					<?php 
					$start = strpos($field, '<p>');
					$end = strpos($field, '</p>', $start);
					$paragraph = substr($field, $start, $end-$start+4); 
					?>

					<div class="fade-up">
						<?= $paragraph ?>
					</div>

				<?php endif ?>
				
			</div>
		</div>

		<?php $taxonomies = ['location', 'department', 'employment_type', 'experience_level'] ?>

		<?php if ($taxonomies): ?>
			<div class="tags fade-up">

				<?php foreach ($taxonomies as $taxonomy): ?>
					<span><?= wp_get_object_terms(get_the_ID(), $taxonomy)[0]->name ?></span>
				<?php endforeach ?>

				<span><?= get_field('is_remote') ? __('Remote') : __('Office') ?></span>

			</div>
		<?php endif ?>
		
	</div>
</section>

<?php if (get_field('description') || get_field('requirements')): ?>
<section class="block-text">
	<div class="container-fluid">
		<?= $paragraph ? substr(get_field('description'), strlen($paragraph) + 1) : get_field('description') ?>
		<?php the_field('requirements') ?>
	</div>
</section>
<?php endif ?>

<section class="block-contact-form block-contact-form--type1">
	<div class="container-fluid">
		<div class="row justify-content-between">
			<div class="col-md-6 col-lg-4">
				<div class="form-description fade-up">
					
					<?php if ($field = get_field('form_2', 'option')['title']): ?>
						<h3><?= $field ?></h3>
					<?php endif ?>

					<?php if ($field = get_field('form_2', 'option')['text']): ?>
						<?= $field ?>
					<?php endif ?>

				</div>
			</div>

			<?php if ($field = get_field('form_2', 'option')['form']): ?>
				<div class="col-md-6 col-lg-8 col-xxl-7">
					<?= do_shortcode('[contact-form-7 id="' . $field . '"]') ?>
				</div>
			<?php endif ?>

		</div>
	</div>
</section>

<section class="block-share">
	<div class="container-fluid">
		<div class="block-inner">

			<?php if ($field = get_field('share_2', 'option')['title']): ?>
				<h3><?= $field ?></h3>
			<?php endif ?>

			<?php if ($field = get_field('share_2', 'option')['text']): ?>
				<div class="fade-up"><?= $field ?></div>
			<?php endif ?>

			<ul>
				<li class="fade-up">
					<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_permalink() ?>" class="btn btn-outline-secondary" target="_blank">
						<svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0.738892 2.55556C0.738892 1.8148 0.998158 1.20369 1.51667 0.722222C2.03518 0.240733 2.70927 0 3.53889 0C4.35371 0 5.01296 0.237022 5.51667 0.711111C6.03518 1.2 6.29445 1.83702 6.29445 2.62222C6.29445 3.33333 6.0426 3.92591 5.53889 4.4C5.02038 4.88889 4.33889 5.13333 3.49445 5.13333H3.47222C2.6574 5.13333 1.99816 4.88889 1.49445 4.4C0.990736 3.91111 0.738892 3.29629 0.738892 2.55556ZM1.02778 22V7.15556H5.96111V22H1.02778ZM8.69445 22H13.6278V13.7111C13.6278 13.1926 13.687 12.7926 13.8056 12.5111C14.013 12.0074 14.3278 11.5815 14.75 11.2333C15.1722 10.8852 15.7018 10.7111 16.3389 10.7111C17.9982 10.7111 18.8278 11.8296 18.8278 14.0667V22H23.7611V13.4889C23.7611 11.2963 23.2426 9.63333 22.2056 8.5C21.1685 7.36667 19.7982 6.8 18.0944 6.8C16.1833 6.8 14.6944 7.62222 13.6278 9.26667V9.31111H13.6056L13.6278 9.26667V7.15556H8.69445C8.72407 7.62962 8.73889 9.10369 8.73889 11.5778C8.73889 14.0518 8.72407 17.5259 8.69445 22Z" fill="#0B0B0B" />
							<path d="M0.738892 2.55556C0.738892 1.8148 0.998158 1.20369 1.51667 0.722222C2.03518 0.240733 2.70927 0 3.53889 0C4.35371 0 5.01296 0.237022 5.51667 0.711111C6.03518 1.2 6.29445 1.83702 6.29445 2.62222C6.29445 3.33333 6.0426 3.92591 5.53889 4.4C5.02038 4.88889 4.33889 5.13333 3.49445 5.13333H3.47222C2.6574 5.13333 1.99816 4.88889 1.49445 4.4C0.990736 3.91111 0.738892 3.29629 0.738892 2.55556ZM1.02778 22V7.15556H5.96111V22H1.02778ZM8.69445 22H13.6278V13.7111C13.6278 13.1926 13.687 12.7926 13.8056 12.5111C14.013 12.0074 14.3278 11.5815 14.75 11.2333C15.1722 10.8852 15.7018 10.7111 16.3389 10.7111C17.9982 10.7111 18.8278 11.8296 18.8278 14.0667V22H23.7611V13.4889C23.7611 11.2963 23.2426 9.63333 22.2056 8.5C21.1685 7.36667 19.7982 6.8 18.0944 6.8C16.1833 6.8 14.6944 7.62222 13.6278 9.26667V9.31111H13.6056L13.6278 9.26667V7.15556H8.69445C8.72407 7.62962 8.73889 9.10369 8.73889 11.5778C8.73889 14.0518 8.72407 17.5259 8.69445 22Z" fill="#0B0B0B" />
						</svg>
					</a>
				</li>
				<li class="fade-up">
					<a href="https://twitter.com/intent/tweet?url=<?= get_permalink() ?>&text=" class="btn btn-outline-secondary" target="_blank">
						<svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path id="Vector" d="M13.598 9.3155L21.6118 0H19.7128L12.7544 8.08852L7.19665 0H0.786499L9.19083 12.2313L0.786499 22H2.68564L10.034 13.4583L15.9033 22H22.3134L13.5975 9.3155H13.598ZM10.9968 12.339L10.1453 11.1211L3.36993 1.42965H6.2869L11.7547 9.25094L12.6062 10.4689L19.7137 20.6354H16.7967L10.9968 12.3395V12.339Z" fill="#0B0B0B" />
						</svg>
					</a>
				</li>
				<li class="fade-up">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink() ?>" class="btn btn-outline-secondary" target="_blank">
						<svg width="12" height="22" viewBox="0 0 12 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path id="Vector" d="M9.39995 3.48837C8.03595 3.48837 7.6482 4.09338 7.6482 5.42712V7.6285H11.2761L10.9186 11.1946H7.64751V22H3.30595V11.1939H0.377197V7.62781H3.30732V5.48831C3.30732 1.89062 4.7497 0 8.79564 0C9.66395 0 10.7028 0.06875 11.3229 0.155375V3.5035" fill="#0B0B0B" />
						</svg>
					</a>
				</li>
				<li class="fade-up">
					<a href="https://wa.me/<?= get_field('whatsapp_1', 'option') ?>" class="btn btn-outline-secondary" target="_blank">
						<svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path id="Vector" d="M10.6165 0.0127228C4.80636 0.28937 0.221316 5.12812 0.238942 10.9449C0.244309 12.7165 0.672013 14.3887 1.42651 15.8662L0.268091 21.4893C0.205427 21.7935 0.479759 22.0598 0.781925 21.9883L6.29188 20.6828C7.70748 21.388 9.29749 21.7953 10.9803 21.8209C16.9188 21.9116 21.8705 17.1963 22.0556 11.2599C22.254 4.89657 17.0022 -0.291389 10.6165 0.0127228ZM17.1911 16.9522C15.5775 18.5659 13.432 19.4545 11.15 19.4545C9.8138 19.4545 8.53452 19.1547 7.34759 18.5635L6.58026 18.1813L3.20209 18.9816L3.91318 15.5298L3.53514 14.7895C2.91897 13.5828 2.60655 12.2779 2.60655 10.9111C2.60655 8.62904 3.49521 6.48363 5.10884 4.86994C6.70806 3.27072 8.88852 2.36759 11.1502 2.36759C13.4322 2.36765 15.5775 3.25631 17.1911 4.86989C18.8048 6.48353 19.6934 8.62894 19.6935 10.9109C19.6934 13.1726 18.7903 15.3531 17.1911 16.9522Z" fill="#0B0B0B" />
							<path id="Vector_2" d="M16.4459 13.2775L14.3324 12.6706C14.0545 12.5909 13.7553 12.6697 13.5529 12.876L13.036 13.4026C12.8181 13.6246 12.4874 13.6959 12.199 13.5792C11.1992 13.1746 9.09608 11.3047 8.55899 10.3694C8.40404 10.0996 8.42967 9.76226 8.61992 9.51607L9.07114 8.93232C9.24793 8.7036 9.28523 8.39644 9.16832 8.13205L8.27914 6.12096C8.06615 5.63927 7.45062 5.49906 7.04848 5.83916C6.45862 6.33805 5.75874 7.09617 5.67366 7.93606C5.52366 9.41684 6.15872 11.2835 8.5602 13.5249C11.3346 16.1143 13.5563 16.4564 15.0028 16.106C15.8233 15.9073 16.479 15.1106 16.8928 14.4583C17.1749 14.0135 16.9521 13.4229 16.4459 13.2775Z" fill="#0B0B0B" />
						</svg>
					</a>
				</li>
				<li class="fade-up">
					<a href="mailto:<?= get_field('email_1', 'option') ?>" class="btn btn-outline-secondary">
						<svg width="33" height="22" viewBox="0 0 33 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path id="Vector" d="M27.5597 14.8499L22.348 8.72232L26.9771 6.08131C27.4294 5.82335 27.5869 5.24745 27.3289 4.79519C27.0709 4.34287 26.4949 4.18535 26.0427 4.44338C25.6557 4.6642 16.8836 9.6687 16.4528 9.91453C16.0198 9.6675 7.24574 4.66181 6.86288 4.44338C6.41056 4.18542 5.83485 4.34275 5.57669 4.79519C5.31873 5.24745 5.47612 5.82329 5.9285 6.08131L10.5576 8.72232L5.34588 14.8499C5.00853 15.2466 5.05655 15.8415 5.45324 16.1789C5.84987 16.5164 6.44513 16.4681 6.78229 16.0716L12.2243 9.67322L15.9856 11.8191C16.2752 11.9843 16.6305 11.9842 16.92 11.8191L20.6813 9.67322L26.1232 16.0716C26.4607 16.4684 27.0559 16.5162 27.4523 16.1789C27.849 15.8416 27.897 15.2466 27.5597 14.8499Z" fill="#0B0B0B" />
							<path id="Vector_2" d="M29.7128 0H3.18709C1.62742 0 0.358521 1.2689 0.358521 2.82857V19.1714C0.358521 20.7311 1.62742 22 3.18709 22H29.7128C31.2725 22 32.5414 20.7311 32.5414 19.1714V2.82857C32.5414 1.2689 31.2725 0 29.7128 0ZM30.6557 19.1714C30.6557 19.6913 30.2327 20.1143 29.7128 20.1143H3.18709C2.6672 20.1143 2.24423 19.6913 2.24423 19.1714V2.82857C2.24423 2.30868 2.6672 1.88571 3.18709 1.88571H29.7128C30.2327 1.88571 30.6557 2.30868 30.6557 2.82857V19.1714Z" fill="#0B0B0B" />
						</svg>
					</a>
				</li>
				<li class="fade-up">
					<a href="#" class="btn btn-outline-secondary" data-id="copyUrl">
						<?= mb_strtoupper(__('Copy link', 'WSC')) ?>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path id="Vector" d="M14.7286 1.72322L14.2179 1.27133C13.6619 0.778684 12.9464 0.507324 12.2028 0.507324C11.3326 0.507324 10.5034 0.879754 9.92762 1.52922L8.46593 3.17868C8.27769 3.39069 8.18338 3.66343 8.20052 3.94645C8.21769 4.22906 8.34365 4.48836 8.55565 4.67635L8.69249 4.79783C8.8867 4.97031 9.13697 5.06525 9.39677 5.06525L9.4601 5.06343C9.74271 5.04644 10.0022 4.92046 10.1908 4.70814L11.6528 3.05849C11.91 2.76817 12.398 2.739 12.6889 2.99603L13.1994 3.4489C13.3458 3.57849 13.4328 3.75787 13.4447 3.95406C13.4566 4.1501 13.3916 4.33839 13.2616 4.48463L10.0641 8.09152C9.84887 8.3347 9.4667 8.4049 9.1782 8.25623C8.72875 8.0244 8.14283 8.13505 7.80947 8.51078L7.7844 8.53933C7.5509 8.80197 7.45366 9.151 7.51696 9.49836C7.5809 9.84362 7.7959 10.1397 8.1075 10.3028C8.53872 10.5282 9.02517 10.6521 9.51412 10.6521H9.51449C10.3843 10.6521 11.2139 10.2748 11.79 9.62514L14.987 6.01628C16.0983 4.76244 15.9829 2.83554 14.7286 1.72322Z" fill="#0B0B0B" />
							<path id="Vector_2" d="M7.80634 11.2137C7.38488 10.8405 6.68322 10.8825 6.30866 11.3043L4.84731 12.9534C4.5901 13.2436 4.10242 13.2737 3.81194 13.0164L3.30086 12.563C3.1545 12.4333 3.06745 12.2539 3.05558 12.0579C3.04365 11.8622 3.10868 11.6739 3.23858 11.5277L6.43569 7.92107C6.6477 7.68165 7.02297 7.60932 7.30817 7.74946C7.77439 7.9791 8.36755 7.86718 8.72802 7.45913C8.9572 7.20094 9.05346 6.85802 8.99275 6.51987C8.93244 6.17976 8.72306 5.89122 8.41871 5.72852C7.98085 5.49407 7.48527 5.37012 6.98603 5.37012C6.11583 5.37012 5.28658 5.7427 4.71084 6.39226L1.51333 9.99828C0.401433 11.2521 0.51718 13.1766 1.77112 14.2884L2.28183 14.735C2.83747 15.2276 3.55304 15.4929 4.2966 15.4929C4.29694 15.4929 4.2966 15.4929 4.29694 15.4929C5.16714 15.4929 5.99673 15.1263 6.57278 14.4767L8.03388 12.8309C8.22246 12.6186 8.3168 12.3471 8.2996 12.0657C8.28316 11.7861 8.15357 11.5201 7.94385 11.3348L7.80634 11.2137Z" fill="#0B0B0B" />
						</svg>
					</a>
				</li>
			</ul>
		</div>
	</div>
</section>

<?php if ( have_posts() ) :

	get_template_part( 'template-parts/content', 'builder' );

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

<script type="application/ld+json">
    {
      "@context" : "https://schema.org/",
      "@type" : "JobPosting",
      "title" : "<?php the_title() ?>",
      "description" : "<?php html_entity_decode(the_field('description')) ?>",
      "identifier": {
        "@type": "PropertyValue",
        "name": "<?php the_field('company_name') ?>",
        "value": "<?php the_field('uid') ?>"
      },
      "datePosted" : "<?php the_field('time_updated') ?>",
      "validThrough" : "",
      "employmentType" : "[<?= implode(', ', wp_list_pluck(wp_get_object_terms(get_the_ID(), employment_type), 'name')) ?>]",
      "hiringOrganization" : {
        "@type" : "Organization",
        "name" : "Google",
        "sameAs" : "https://www.google.com",
        "logo" : "https://www.example.com/images/logo.png"
      },
      "jobLocation": {
      "@type": "Place",
        "address": {
        "@type": "PostalAddress",
        "streetAddress": "1600 Amphitheatre Pkwy",
        "addressLocality": "Mountain View",
        "addressRegion": "CA",
        "postalCode": "94043",
        "addressCountry": "US"
        }
      },
      "baseSalary": {
        "@type": "MonetaryAmount",
        "currency": "USD",
        "value": {
          "@type": "QuantitativeValue",
          "value": 40.00,
          "unitText": "HOUR"
        }
      }
    }
    </script>

<?php get_footer(); ?>