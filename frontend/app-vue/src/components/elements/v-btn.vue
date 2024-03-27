<template>
    <component :is="tagName" :to="route" :class="buttonClass">{{ text }}</component>
</template>
  
<script>
export default {
    props: {
        route: {
            type: String,
        },
        color: {
            type: String,
            default: 'primary'
        },
        text: {
            type: String
        }
    },
    computed: {
        tagName() {
            return this.route ? 'router-link' : 'button';
        },
        buttonClass() {
            return [{ 'website-button': true }, 'website--' + this.color + '-button'];
        }
    }
}
</script>
  
<style lang="scss">
.website-button {
    background: none;
    border-radius: rem(7px);
    padding: rem(12px) rem(30px);
    width: 100%;
    font-weight: 700;
    font-size: rem(16px);
    text-align: center;
    font-family: var(--font-family);
    text-decoration: none;
    border: none;
    cursor: pointer;
}

.website--primary-button {
    background: var(--color-primary);
    color: var(--color-white);
}

.website--white-button {
    color: var(--color-primary);
    border: rem(1.5px) solid var(--color-tone-10);
}
</style>
  