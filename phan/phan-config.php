<?php

return [
    'directory_list' => [
        '.',
    ],
    'exclude_analysis_directory_list' => [
        'vendor',
    ],
    'debug_max_frame_length' => 100000,
    'debug_dump_ast' => false,
//    'minimum_severity' => 10,
    'plugins' => [
        'DeprecateAliasPlugin',
        'PHP53CompatibilityPlugin',
        'InvokePHPNativeSyntaxCheckPlugin',
        'UseReturnValuePlugin',
        'UnsafeCodePlugin',
        'PregRegexCheckerPlugin',
        'RemoveDebugStatementPlugin',
    ],
    'suppress_issue_types' => [
        'PhanUndeclaredClass',
        'PhanUndeclaredClassMethod',
        'PhanUndeclaredExtendedClass',
        'PhanUndeclaredMethod',
        'PhanUndeclaredFunction',
        'PhanUndeclaredStaticMethod',
        'PhanUndeclaredTrait',
        'PhanUndeclaredClassConstant',
        'PhanUndeclaredClassInstanceof',
        'PhanUndeclaredTypeReturnType',
        'PhanUndeclaredProperty',
        'PhanUndeclaredTypeProperty',
        'PhanUndeclaredTypeParameter',
        'PhanUnreferencedClass',
        'PhanUnreferencedProtectedProperty',
        'PhanUnreferencedPublicMethod',
        'PhanReadOnlyProtectedProperty',

        // comentarios
        'PhanCommentParamWithoutRealParam',
        'PhanCommentParamOnEmptyParamList',
        'PhanUnextractableAnnotation',

        'PhanUnreferencedProtectedMethod',
        'PhanTypeMismatchReturn',
        'PhanPluginCompatibilityShortArray',
    ],

    'ignore_undeclared_properties_in_magic_methods' => true,
    'enable_deprecation_warnings' => true, // Verificar códigos depreciados
    'security_check' => true, // Verificar questões de segurança
    'dead_code_detection' => true, // Detectar código morto
    'unused_variable_detection' => true, // Detectar variáveis não utilizadas
    'redundant_condition_detection' => true, // Detectar condições redundantes
];
