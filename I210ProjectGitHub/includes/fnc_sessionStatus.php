<?php

/**
 * Checks session status and initiates a session if there is not one already active.
 * @return void
 */
function sessionStatus() {
    if (session_status() == PHP_SESSION_NONE)
        session_start();
}