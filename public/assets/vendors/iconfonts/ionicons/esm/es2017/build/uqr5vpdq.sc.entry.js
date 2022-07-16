import { h } from '../ionicons.core.js';

import { a as getName, b as isSrc, c as getSrc, d as getIconMap, e as isValid } from './chunk-1ca7e569.js';

class Icon {
    constructor() {
        this.isVisible = false;
        this.lazy = false;
    }
    componentWillLoad() {
        this.waitUntilVisible(this.el, '50px', () => {
            this.isVisible = true;
            this.loadIcon();
        });
    }
    componentDidUnload() {
        if (this.io) {
            this.io.disconnect();
            this.io = undefined;
        }
    }
    waitUntilVisible(el, rootMargin, cb) {
        if (this.lazy && this.win && this.win.IntersectionObserver) {
            const io = this.io = new this.win.IntersectionObserver((data) => {
                if (data[0].isIntersecting) {
                    io.disconnect();
                    this.io = undefined;
                    cb();
                }
            }, { rootMargin });
            io.observe(el);
        }
        else {
            cb();
        }
    }
    loadIcon() {
        if (!this.isServer && this.isVisible) {
            const url = this.getUrl();
            if (url) {
                getSvgContent(this.doc, url, 's-ion-icon')
                    .then(svgContent => this.svgContent = svgContent);
            }
            else {
                console.error('icon was not resolved');
            }
        }
        if (!this.ariaLabel) {
            const name = getName(this.getName(), this.mode, this.ios, this.md);
            if (name) {
                this.ariaLabel = name
                    .replace('ios-', '')
                    .replace('md-', '')
                    .replace(/\-/g, ' ');
            }
        }
    }
    getName() {
        if (this.name !== undefined) {
            return this.name;
        }
        if (this.icon && !isSrc(this.icon)) {
            return this.icon;
        }
        return undefined;
    }
    getUrl() {
        let url = getSrc(this.src);
        if (url) {
            return url;
        }
        url = getName(this.getName(), this.mode, this.ios, this.md);
        if (url) {
            return this.getNamedUrl(url);
        }
        url = getSrc(this.icon);
        if (url) {
            return url;
        }
        return null;
    }
    getNamedUrl(name) {
        const url = getIconMap().get(name);
        if (url) {
            return url;
        }
        return `${this.resourcesUrl}svg/${name}.svg`;
    }
    hostData() {
        const flipRtl = this.flipRtl || (this.ariaLabel && this.ariaLabel.indexOf('arrow') > -1 && this.flipRtl !== false);
        return {
            'role': 'img',
            class: Object.assign({}, createColorClasses(this.color), { [`icon-${this.size}`]: !!this.size, 'flip-rtl': flipRtl && this.doc.dir === 'rtl' })
        };
    }
    render() {
        if (!this.isServer && this.svgContent) {
            return h("div", { class: "icon-inner", innerHTML: this.svgContent });
        }
        return h("div", { class: "icon-inner" });
    }
    static get is() { return "ion-icon"; }
    static get encapsulation() { return "shadow"; }
    static get properties() { return {
        "ariaLabel": {
            "type": String,
            "attr": "aria-label",
            "reflectToAttr": true,
            "mutable": true
        },
        "color": {
            "type": String,
            "attr": "color"
        },
        "doc": {
            "context": "document"
        },
        "el": {
            "elementRef": true
        },
        "flipRtl": {
            "type": Boolean,
            "attr": "flip-rtl"
        },
        "icon": {
            "type": String,
            "attr": "icon",
            "watchCallbacks": ["loadIcon"]
        },
        "ios": {
            "type": String,
            "attr": "ios"
        },
        "isServer": {
            "context": "isServer"
        },
        "isVisible": {
            "state": true
        },
        "lazy": {
            "type": Boolean,
            "attr": "lazy"
        },
        "md": {
            "type": String,
            "attr": "md"
        },
        "mode": {
            "type": String,
            "attr": "mode"
        },
        "name": {
            "type": String,
            "attr": "name",
            "watchCallbacks": ["loadIcon"]
        },
        "resourcesUrl": {
            "context": "resourcesUrl"
        },
        "size": {
            "type": String,
            "attr": "size"
        },
        "src": {
            "type": String,
            "attr": "src",
            "watchCallbacks": ["loadIcon"]
        },
        "svgContent": {
            "state": true
        },
        "win": {
            "context": "window"
        }
    }; }
    static get style() { return ".sc-ion-icon-h{display:inline-block;width:1em;height:1em;contain:strict;-webkit-box-sizing:content-box!important;box-sizing:content-box!important}.icon-inner.sc-ion-icon, svg.sc-ion-icon{display:block;fill:currentColor;stroke:currentColor;height:100%;width:100%}.flip-rtl.sc-ion-icon-h   .icon-inner.sc-ion-icon{-webkit-transform:scaleX(-1);transform:scaleX(-1)}.icon-small.sc-ion-icon-h{font-size:18px!important}.icon-large.sc-ion-icon-h{font-size:32px!important}.ion-color.sc-ion-icon-h{color:var(--ion-color-base)!important}.ion-color-primary.sc-ion-icon-h{--ion-color-base:var(--ion-color-primary,#3880ff)}.ion-color-secondary.sc-ion-icon-h{--ion-color-base:var(--ion-color-secondary,#0cd1e8)}.ion-color-tertiary.sc-ion-icon-h{--ion-color-base:var(--ion-color-tertiary,#f4a942)}.ion-color-success.sc-ion-icon-h{--ion-color-base:var(--ion-color-success,#10dc60)}.ion-color-warning.sc-ion-icon-h{--ion-color-base:var(--ion-color-warning,#ffce00)}.ion-color-danger.sc-ion-icon-h{--ion-color-base:var(--ion-color-danger,#f14141)}.ion-color-light.sc-ion-icon-h{--ion-color-base:var(--ion-color-light,#f4f5f8)}.ion-color-medium.sc-ion-icon-h{--ion-color-base:var(--ion-color-medium,#989aa2)}.ion-color-dark.sc-ion-icon-h{--ion-color-base:var(--ion-color-dark,#222428)}"; }
}
const requests = new Map();
function getSvgContent(doc, url, scopedId) {
    let req = requests.get(url);
    if (!req) {
        req = fetch(url, { cache: 'force-cache' }).then(rsp => {
            if (isStatusValid(rsp.status)) {
                return rsp.text();
            }
            return Promise.resolve(null);
        }).then(svgContent => validateContent(doc, svgContent, scopedId));
        requests.set(url, req);
    }
    return req;
}
function isStatusValid(status) {
    return status <= 299;
}
function validateContent(document, svgContent, scopeId) {
    if (svgContent) {
        const frag = document.createDocumentFragment();
        const div = document.createElement('div');
        div.innerHTML = svgContent;
        frag.appendChild(div);
        for (let i = div.childNodes.length - 1; i >= 0; i--) {
            if (div.childNodes[i].nodeName.toLowerCase() !== 'svg') {
                div.removeChild(div.childNodes[i]);
            }
        }
        const svgElm = div.firstElementChild;
        if (svgElm && svgElm.nodeName.toLowerCase() === 'svg') {
            if (scopeId) {
                svgElm.setAttribute('class', scopeId);
            }
            if (isValid(svgElm)) {
                return div.innerHTML;
            }
        }
    }
    return '';
}
function createColorClasses(color) {
    return (color) ? {
        'ion-color': true,
        [`ion-color-${color}`]: true
    } : null;
}

export { Icon as IonIcon };
