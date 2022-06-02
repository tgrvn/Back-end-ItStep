import './style.scss';

export function Button({ style, value, buttonEvent }) {
    return (<button style={style} onClick={buttonEvent} >{value}</button>)
}