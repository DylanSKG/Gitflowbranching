import { handleVariablesFor } from 'customizer-sync-helpers'
import {
	handleBackgroundOptionFor,
	typographyOption,
} from 'blocksy-customizer-sync'

handleVariablesFor({
	floatingBarFontColor: {
		selector: '.ct-floating-bar .ct-item-title, .ct-floating-bar .price',
		variable: 'color',
		type: 'color',
		responsive: true,
	},

	floatingBarBackground: {
		selector: '.ct-floating-bar',
		variable: 'backgroundColor',
		type: 'color',
	},

	...handleBackgroundOptionFor({
		id: 'floatingBarBackground',
		selector: '.ct-floating-bar',
		responsive: true,
	}),

	floatingBarShadow: {
		selector: '.ct-floating-bar',
		type: 'box-shadow',
		variable: 'box-shadow',
		responsive: true,
	},

	// off canvas filter
	filter_panel_width: {
		selector: '#woo-filters-panel',
		variable: 'side-panel-width',
		responsive: true,
		unit: '',
	},

	panel_widgets_spacing: {
		selector: '#woo-filters-panel .ct-sidebar',
		variable: 'sidebar-widgets-spacing',
		responsive: true,
		unit: 'px',
	},

	filter_panel_content_vertical_alignment: {
		selector: '#woo-filters-panel',
		variable: 'vertical-alignment',
		responsive: true,
		unit: '',
	},

	...typographyOption({
		id: 'filter_panel_widgets_title_font',
		selector: '#woo-filters-panel .widget-title',
	}),

	filter_panel_widgets_title_color: {
		selector: '#woo-filters-panel .widget-title',
		variable: 'heading-color',
		type: 'color',
		responsive: true,
	},

	...typographyOption({
		id: 'filter_panel_widgets_font',
		selector:
			'#woo-filters-panel .ct-widget > *:not(.widget-title):not(blockquote)',
	}),

	floating_bar_position: [
		{
			selector: '.ct-floating-bar',
			variable: 'top-position',
			extractValue: (value) => {
				value = value.desktop
					? value
					: {
							desktop: value,
							tablet: value,
							mobile: value,
					  }

				return {
					desktop:
						value.desktop === 'top'
							? 'CT_CSS_SKIP_RULE'
							: 'calc(100vh - 75px - var(--frame-size, 0px))',

					tablet:
						value.tablet === 'top'
							? 'CT_CSS_SKIP_RULE'
							: 'calc(100vh - 75px - var(--frame-size, 0px))',

					mobile:
						value.mobile === 'top'
							? 'CT_CSS_SKIP_RULE'
							: 'calc(100vh - 75px - var(--frame-size, 0px))',
				}
			},
			responsive: true,
		},

		{
			selector: '.ct-floating-bar',
			variable: 'translate-offset',
			extractValue: (value) => {
				value = value.desktop
					? value
					: {
							desktop: value,
							tablet: value,
							mobile: value,
					  }

				return {
					desktop:
						value.desktop === 'top' ? 'CT_CSS_SKIP_RULE' : '75px',
					tablet:
						value.tablet === 'top' ? 'CT_CSS_SKIP_RULE' : '75px',
					mobile:
						value.mobile === 'top' ? 'CT_CSS_SKIP_RULE' : '75px',
				}
			},
			responsive: true,
		},
	],

	filter_panel_widgets_font_color: [
		{
			selector: '#woo-filters-panel .ct-sidebar > *',
			variable: 'color',
			type: 'color:default',
			responsive: true,
		},

		{
			selector: '#woo-filters-panel .ct-sidebar',
			variable: 'linkInitialColor',
			type: 'color:link_initial',
			responsive: true,
		},

		{
			selector: '#woo-filters-panel .ct-sidebar',
			variable: 'linkHoverColor',
			type: 'color:link_hover',
			responsive: true,
		},
	],

	...handleBackgroundOptionFor({
		id: 'filter_panel_background',
		selector: '#woo-filters-panel .ct-panel-inner',
		responsive: true,
	}),

	...handleBackgroundOptionFor({
		id: 'filter_panel_backgrop',
		selector: '#woo-filters-panel',
		responsive: true,
	}),

	filter_panel_close_button_color: [
		{
			selector: '#woo-filters-panel .ct-toggle-close',
			variable: 'icon-color',
			type: 'color:default',
			responsive: true,
		},

		{
			selector: '#woo-filters-panel .ct-toggle-close:hover',
			variable: 'icon-color',
			type: 'color:hover',
			responsive: true,
		},
	],

	filter_panel_close_button_border_color: [
		{
			selector: '#woo-filters-panel .ct-toggle-close[data-type="type-2"]',
			variable: 'toggle-button-border-color',
			type: 'color:default',
			responsive: true,
		},

		{
			selector: '#woo-filters-panel .ct-toggle-close[data-type="type-2"]:hover',
			variable: 'toggle-button-border-color',
			type: 'color:hover',
			responsive: true,
		},
	],

	filter_panel_close_button_shape_color: [
		{
			selector: '#woo-filters-panel .ct-toggle-close[data-type="type-3"]',
			variable: 'toggle-button-background',
			type: 'color:default',
			responsive: true,
		},

		{
			selector: '#woo-filters-panel .ct-toggle-close[data-type="type-3"]:hover',
			variable: 'toggle-button-background',
			type: 'color:hover',
			responsive: true,
		},
	],

	filter_panel_shadow: {
		selector: '#woo-filters-panel',
		forcedOutput: true,
		type: 'box-shadow',
		variable: 'box-shadow',
		responsive: true,
	},

	// share box
	product_share_box_icons_size: {
		selector: '[data-prefix="product"] .ct-share-box',
		variable: 'icon-size',
		responsive: true,
		unit: 'px',
	},

	product_share_box_icons_spacing: {
		selector: '[data-prefix="product"] .ct-share-box',
		variable: 'spacing',
		responsive: true,
		unit: 'px',
	},

	product_share_items_icon_color: [
		{
			selector: '[data-prefix="product"] .ct-share-box',
			variable: 'icon-color',
			type: 'color:default',
		},

		{
			selector: '[data-prefix="product"] .ct-share-box',
			variable: 'icon-hover-color',
			type: 'color:hover',
		},
	],

	// wish list share box
	single_page_share_box_icon_size: {
		selector: '[data-prefix="single_page"] .ct-share-box',
		variable: 'icon-size',
		responsive: true,
		unit: 'px',
	},

	single_page_share_box_icons_spacing: {
		selector: '[data-prefix="single_page"] .ct-share-box',
		variable: 'spacing',
		responsive: true,
		unit: 'px',
	},

	single_page_share_items_icon_color: [
		{
			selector: '[data-prefix="single_page"] .ct-share-box',
			variable: 'icon-color',
			type: 'color:default',
		},

		{
			selector: '[data-prefix="single_page"] .ct-share-box',
			variable: 'icon-hover-color',
			type: 'color:hover',
		},
	],

	// Single product type 2
	product_view_stacked_columns: {
		selector: '.ct-stacked-gallery .woocommerce-product-gallery',
		variable: 'columns',
		responsive: true,
		unit: '',
	},

	// add to wishlist buttons
	archive_wishlist_button_icon_color: [
		{
			selector: '.ct-wishlist-button-archive',
			variable: 'icon-color',
			type: 'color:default',
			responsive: true,
		},

		{
			selector: '.ct-wishlist-button-archive',
			variable: 'icon-hover-color',
			type: 'color:hover',
			responsive: true,
		},
	],

	archive_wishlist_button_background_color: [
		{
			selector: '.ct-wishlist-button-archive',
			variable: 'trigger-background',
			type: 'color:default',
			responsive: true,
		},

		{
			selector: '.ct-wishlist-button-archive',
			variable: 'trigger-hover-background',
			type: 'color:hover',
			responsive: true,
		},
	],

	single_wishlist_button_icon_color: [
		{
			selector: '.product[class*="gallery"] .ct-wishlist-button-single',
			variable: 'icon-color',
			type: 'color:default',
			responsive: true,
		},

		{
			selector: '.product[class*="gallery"] .ct-wishlist-button-single',
			variable: 'icon-hover-color',
			type: 'color:hover',
			responsive: true,
		},
	],

	// single_wishlist_button_background_color: [
	// 	{
	// 		selector: '.product[class*="gallery"] .ct-wishlist-button-single',
	// 		variable: 'border-color',
	// 		type: 'color:default',
	// 		responsive: true,
	// 	},

	// 	{
	// 		selector: '.product[class*="gallery"] .ct-wishlist-button-single',
	// 		variable: 'border-hover-color',
	// 		type: 'color:hover',
	// 		responsive: true,
	// 	},
	// ],

	quick_view_wishlist_button_icon_color: [
		{
			selector:
				'.ct-quick-view-card .ct-wishlist-button-single',
			variable: 'icon-color',
			type: 'color:default',
			responsive: true,
		},

		{
			selector:
				'.ct-quick-view-card .ct-wishlist-button-single',
			variable: 'icon-hover-color',
			type: 'color:hover',
			responsive: true,
		},
	],

	// quick_view_wishlist_button_background_color: [
	// 	{
	// 		selector:
	// 			'.ct-quick-view-card .ct-wishlist-button-single',
	// 		variable: 'trigger-background',
	// 		type: 'color:default',
	// 		responsive: true,
	// 	},

	// 	{
	// 		selector:
	// 			'.ct-quick-view-card .ct-wishlist-button-single',
	// 		variable: 'trigger-hover-background',
	// 		type: 'color:hover',
	// 		responsive: true,
	// 	},
	// ],
})
