/**
 * Validator for lower case strings.
 */
define(
	[
		'Neos.Neos/Validation/AbstractValidator'
	],
	function(AbstractValidator) {
		return AbstractValidator.extend({
			/**
			 * Checks if the given value is a lower case string.
			 *
			 * @param {mixed} value The value that should be validated
			 * @return {void}
			 */
			isValid: function(value) {
				if (typeof(value) !== 'string' || value.toLowerCase() !== value) {
					this.addError('A lower case string is expected.');
				}
			}
		});
	}
);