import { createElement, useState, useEffect } from '@wordpress/element'
import { __, sprintf } from 'ct-i18n'
import { OptionsPanel, Overlay } from 'blocksy-options'

const CreateHook = () => {
	const [isCreating, setIsCreating] = useState(false)
	const [futureTemplate, setFutureTemplate] = useState({
		name: '',
		type: 'hook',
	})

	useEffect(() => {
		const createHookEl = document.querySelector(
			'[href*="post-new.php?post_type=ct_content_block"].page-title-action'
		)

		createHookEl.addEventListener('click', (e) => {
			e.preventDefault()
			setIsCreating(true)
		})
	}, [])

	return (
		<Overlay
			items={isCreating}
			className="ct-admin-modal ct-content-blocks-modal"
			onDismiss={() => {
				setIsCreating(false)
			}}
			render={() => (
				<div className="ct-modal-content">
					<h2>{__('New Content Block', 'blocksy-companion')}</h2>

					<p>
						{__(
							'Please select the type of your content block and place it in the location you want based on your display and user conditions.',
							'blocksy-companion'
						)}
					</p>

					<div className="ct-options-container">
						<OptionsPanel
							onChange={(optionId, optionValue) =>
								setFutureTemplate({
									...futureTemplate,
									[optionId]: optionValue,
								})
							}
							options={{
								type: {
									label: false,
									type: 'ct-image-picker',
									value: 'hook',
									defaultToFirstItem: false,
									placeholder: __(
										'Select template type...',
										'blocksy-companion'
									),
									attr: {
										'data-columns': 5,
									},

									choices: [
										{
											key: 'hook',
											src: `${ct_localizations.static_public_url}images/hook.svg`,
											title: __(
												'Custom Content/Hooks',
												'blocksy-companion'
											),
										},

										{
											key: 'popup',
											src: `${ct_localizations.static_public_url}images/pop-up.svg`,
											title: __('Popup Template', 'blocksy-companion'),
										},

										{
											key: '404',
											src: `${ct_localizations.static_public_url}images/404.svg`,
											title: __(
												'404 Page Template',
												'blocksy-companion'
											),
										},

										{
											key: 'header',
											src: `${ct_localizations.static_public_url}images/header.svg`,
											title: __('Header Template', 'blocksy-companion'),
										},

										{
											key: 'footer',
											src: `${ct_localizations.static_public_url}images/footer.svg`,
											title: __('Footer Template', 'blocksy-companion'),
										},
									],
								},

								name: {
									type: 'text',
									value: '',
									label: __('Content Block Name', 'blocksy-companion'),
								},
							}}
							value={futureTemplate || {}}
							hasRevertButton={false}
						/>
					</div>

					<div className="ct-modal-actions has-divider">
						<button
							className="button-primary"
							disabled={
								!futureTemplate ||
								!futureTemplate.name ||
								!futureTemplate.type
							}
							onClick={() => {
								wp.ajax
									.send({
										url: `${wp.ajax.settings.url}?action=blocksy_content_blocksy_create&name=${futureTemplate.name}&type=${futureTemplate.type}`,
										contentType: 'application/json',
									})
									.then(({ url }) => {
										window.location = url
									})
							}}>
							{__('Create Content Block', 'blocksy-companion')}
						</button>
					</div>
				</div>
			)}
		/>
	)
}

export default CreateHook
