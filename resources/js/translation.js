export default function __(key, option = 0, replace = {}) {
    var translation = key.split('.').reduce((prev, curr) => {
        return prev ? (prev[curr] ? prev[curr] : key) : null
    }, this.$page.props.language)

    var translation = translation.split('|')[option]

    Object.keys(replace).forEach(function (key) {
        translation = translation.replace(':' + key, replace[key])
    });

    return translation
}
