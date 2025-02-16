module.exports = {
    root: true,
    extends: ['plugin:vue/vue3-recommended'],
    parserOptions: {
        ecmaVersion: 'latest',
    },
    rules: {
        'indent': ['error', 4],
        'vue/html-indent': ['error', 4],
        'vue/script-indent': ['error', 4],
        'vue/multi-word-component-names': 'off',
    }
};
