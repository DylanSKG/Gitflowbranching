import { __, sprintf } from 'ct-i18n'

export const mountPlusAddonsFontsIntegration = ({ getFontsData }) => {
	wp.hooks.addFilter(
		'tpgb.custom-font-family-options',
		'blocksy',
		(options) => {
			const fontsData = getFontsData()

			if (!fontsData) {
				return options
			}

			return Object.values(fontsData)
				.filter(({ type }) => type !== 'google')
				.map(({ type, families }) => {
					let titles = {
						'local-google-fonts': sprintf(
							__('%s Local Google Fonts', 'blocksy-companion'),

							ct_localizations.product_name
						),
						typekit: sprintf(
							__('%s Typekit', 'blocksy-companion'),
							ct_localizations.product_name
						),
						file: sprintf(
							__('%s Custom', 'blocksy-companion'),
							ct_localizations.product_name
						),
						system: sprintf(
							__('%s System', 'blocksy-companion'),
							ct_localizations.product_name
						),
					}

					return {
						id: `blocksy-${type}`,
						title: titles[type],
						options: families.map(({ display, family }) => ({
							label: display || family,
							value: family.replace('ct_typekit_', ''),
						})),
					}
				})
		}
	)
}
