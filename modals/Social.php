<!-- Botones flotantes -->
<div class="floating-buttons">
    <a href="https://wa.link/7b5ajh" class="float-btn whatsapp" target="_blank" rel="noopener" aria-label="WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
    <a href="https://m.me/Huipache.live" class="float-btn messenger" target="_blank" rel="noopener" aria-label="Messenger">
        <i class="fab fa-facebook-messenger"></i>
    </a>
</div>

<style>
/* Contenedor */
.floating-buttons {
    position: fixed;
    bottom: 20px;
    right: 20px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    z-index: 9999;
}

/* Estilos generales */
.float-btn {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 26px;
    text-decoration: none;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    transition: transform .2s ease, box-shadow .2s ease;
}

/* WhatsApp */
.float-btn.whatsapp {
    background: #25D366;
}

/* Messenger */
.float-btn.messenger {
    background: #0084FF;
}

/* Hover */
.float-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 14px rgba(0,0,0,0.4);
    color: #fff;
}
</style>
